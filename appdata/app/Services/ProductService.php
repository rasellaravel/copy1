<?php
namespace App\Services;

use App\Favourite;
use App\Product;
use Cookie;
use Illuminate\Pagination\LengthAwarePaginator;

// use App\Services\TestService1;
/**
 *
 */
class ProductService
{
    private static function get_combinations($arrays)
    {
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            if (empty($property_values)) {
                continue;
            }
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }
    private static function get_filtered_product($model, $sizes, $max_price, $min_price, $colors, $sort_by)
    {
        $products = $model->whereHas('productSizes', function ($q) use ($sizes) {
            foreach ($sizes as $key => $value) {
                if (!$key) {
                    $q->whereJsonContains('size_id', $value);
                } else {
                    $q->orWhereJsonContains('size_id', $value);
                }
            }
            return $q;
        })
            ->whereHas('productPrice', function ($q) use ($max_price, $min_price) {
                if ($max_price) {
                    $q->whereBetween('price', [$min_price, $max_price]);
                } else {
                    $q->where('price', '>=', $min_price);
                }
                return $q;
            })
            ->with([
                'productPrice.customColors' => function ($q) use ($colors) {
                    foreach ($colors as $key => $value) {
                        if (!$key) {
                            $q->where('id', $value);
                        } else {
                            $q->orWhere('id', $value);
                        }
                    }
                    return $q;
                },
                'productSizes.sizes.customSize',
            ])
            ->get();
        if ($sort_by == 'asc') {
            $products = $products->sortBy('productPrice.price');
        } elseif ($sort_by == 'desc') {
            $products = $products->sortByDesc('productPrice.price');
        } else {
            $products = $products->sortByDesc('id');
        }
        return $products;
    }
    public static function get($model, $chunk_sizes, $src = null)
    {
        $url = request()->url();
        $page = request()->page ?: 1;
        $min_price = request()->min_price ?: 0;
        $max_price = request()->max_price ?: 0;
        $colors = request()->color ?: [];
        $sort_by = request()->sort_by ?: '';
        $sizes = request()->sizes ?: [];
        $sizes = self::get_combinations($sizes);
        foreach ($sizes as $key => $size) {
            if (count($size) == 0) {
                unset($sizes[$key]);
            }
        }

        if ($model != null) {
            $data['products'] = $model->products();
        } else {
            $data['products'] = Product::where('title_' . app()->getLocale(), 'LIKE', '%' . $src . '%');
        }
        $data['products'] = self::get_filtered_product($data['products'], $sizes, $max_price, $min_price, $colors, $sort_by);
        if (count($colors)) {

            $data['products'] = $data['products']->filter(function ($item) {
                if (
                    $item->productPrice->customColors->count()
                ) {
                    return $item;
                }
            });
        }

        $filter_sizes = [];
        $filter_colors = [];
        foreach ($data['products'] as $product) {
            foreach ($product->productSizes as $productSize) {
                foreach ($productSize->sizes as $size) {
                    if (!array_key_exists(str_replace(' ', '_', $size->customSize->{'name_' . app()->getLocale()}), $filter_sizes)) {
                        $filter_sizes[str_replace(' ', '_', $size->customSize->{'name_' . app()->getLocale()})] = [];
                    }
                    $filter_sizes[str_replace(' ', '_', $size->customSize->{'name_' . app()->getLocale()})][$size->id] = [
                        'id' => $size->id,
                        'size' => $size->{'size_' . app()->getLocale()},
                    ];
                }
            }
            foreach ($product->productPrice->customColors as $color) {
                $filter_colors[$color->id] = $color->{'color_' . app()->getLocale()};
            }
        }
        $data['filter_colors'] = $filter_colors;
        $data['filter_sizes'] = $filter_sizes;

        $paginator = new LengthAwarePaginator(
            $data['products']->forPage($page, $chunk_sizes),
            $data['products']->count(),
            $chunk_sizes,
            $page,
            ['path' => $url],
            $url
        );

        $data['products'] = $paginator;
        return $data;
    }
    public static function checkFavorite($id)
    {
        if (auth()->check()) {
            $check_Data = Favourite::where('user_id', auth()->user()->id)
                ->where('product_id', $id)
                ->first();
            if (!$check_Data) {
                return 0;
            } else {
                return 1;
            }
        } else {
            $cart = [];
            if (Cookie::get('favorite_items') == null) {
                return 0;
            } else {
                $cart = (array) json_decode(Cookie::get('favorite_items'));
                // dd($id);
                if (!array_key_exists($id, $cart)) {
                    return 0;
                } else {
                    return 1;
                }
            }
        }
    }
}
