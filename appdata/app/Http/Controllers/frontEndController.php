<?php

namespace App\Http\Controllers;

use Hash;
use App\Blog;
use App\Cart;
use App\Menu;
use App\Size;
use App\Slider;
use App\Country;
use App\Package;
use App\Product;
use App\SubMenu;
use App\Shipping;
use App\Favourite;
use App\InnerMenu;
use Carbon\Carbon;
use App\Certificate;
use App\ProductSize;
use App\ProductPrice;
use App\ShippingType;
use App\ShippingSetting;
use Illuminate\Http\Request;
use App\Services\GetCartService;
use App\Http\Resources\CartResource;
use App\Http\Resources\CartResources;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Pagination\LengthAwarePaginator;

class frontEndController extends Controller
{
    public function index()
    {
        $data['product'] = Product::with(['productAltImages', 'productPrice', 'productSizes', 'productSizes.customColor'])->get();
        $data['discount_products'] = ProductPrice::whereNotNull('discount')->orderBy('discount', 'desc')->limit(9)->with('products')->get();

        $data['top_products'] = Product::orderBy('id', 'desc')->limit(10)->where('is_top_product', 1)->with('productPrice')->get();
        $data['last_visited'] = Product::orderBy('last_visit_time', 'desc')->whereNotNull('last_visit_time')->limit(10)->with('productPrice')->get();

        $data['footer_top_products'] = Product::orderBy('id', 'desc')->limit(9)->with('productPrice')->where('is_top_product', 1)->get();
        $data['new_products'] = Product::orderBy('id', 'desc')->limit(9)->with('productPrice')->get();
        $data['sliders'] = Slider::orderBy('id', 'desc')->get();
        return view('front-end.pages.home', $data);
    }
    public function blog()
    {
        $data['blogs'] = Blog::orderBy('id', 'desc')->get();
        return view('front-end.pages.blog', $data);
    }
    public function singleBlog($id)
    {
        $data['blog'] = Blog::find($id);
        return view('front-end.pages.blog-single', $data);
    }

    public function adToCart(Request $request)
    {
        if (auth()->check()) {
            $check_Data = Cart::where('user_id', auth()->user()->id)
				->where('product_id', $request->pro_id)
				->first();
			if ($check_Data) {
				$existing_qan = $check_Data->quantity;
				$id = $check_Data->id;
				$data  = Cart::where('id', $id)
					->update(['quantity' => $existing_qan + 1]);
			} else {
				$data = new Cart;
				$data->user_id = auth()->user()->id;
				$data->product_id = $request->pro_id;
				$data->quantity = 1;
				$data->save();
			}
		} else {
			$cart = [];
			if (Cookie::get('cart_items') == null) {
				$cart[$request->pro_id]['quan'] = 1;
			} else {
				$cart = (array) json_decode(Cookie::get('cart_items'));
				if (!array_key_exists($request->pro_id, $cart)) {
					$cart[$request->pro_id]['quan'] = 1;
				}
			}
			Cookie::queue('cart_items', json_encode($cart), 518400);
		}
		$name  = Product::find($request->pro_id)->{'title_' . app()->getLocale()};
		$res = $name . ' Has been Added To your Busket';
		return $res;
	}
	public function adCartFromDetails(Request $request)
	{
		$quantity = @$request->quantity ?: 1;
		$price = @$request->price ?: 0;
		$color = @$request->color ?: '';
		$yarn_color = @$request->yarn_color ?: '';
		$surface_amber = @$request->surface_amber ?: '';
		$clasp = @$request->clasp ?: '';
		$certificate = @$request->certificate ?: 0;
		$sizes = [];
		if ($request->size) {
			foreach ($request->size as $size) {
				if ($size) {
					$sizes[] = $size;
				}
			}
		}
		if (auth()->check()) {
			$check_Data = Cart::where('user_id', auth()->user()->id)
			->where('product_id', $request->pro_id)
			->when($price, function ($q) use ($price) {
				return $q->where('price', $price);
			})
			->when($color, function ($q) use ($color) {
				return $q->where('color', $color);
			})
			->when($yarn_color, function ($q) use ($yarn_color) {
				return $q->where('yarn_color', $yarn_color);
			})
			->when($sizes, function ($q) use ($sizes) {
				return $q->where('size', json_encode($sizes));
			})
			->when($clasp, function ($q) use ($clasp) {
				return $q->where('clasp', $clasp);
			})
			->when($surface_amber, function ($q) use ($surface_amber) {
				return $q->where('surface_amber', $surface_amber);
			})
			->when($certificate, function ($q) use ($certificate) {
				return $q->where('certificate', $certificate);
			})
			->first();
			if (!$check_Data) {
				$data = new Cart;
			} else {
				$data = $check_Data;
				$quantity += $data->quantity;
			}
			$data->user_id = auth()->user()->id;
			$data->product_id = $request->pro_id;
			$data->quantity = $quantity;
			$data->price = $price;
			$data->color = $color;
			$data->yarn_color = $yarn_color;
			$data->size = $sizes;
			$data->clasp = $clasp;
			$data->surface_amber = $surface_amber;
			if($request->certificate) {
				$data->certificate = $request->certificate;
			}else {
				$data->certificate = 0;
			}
			$data->save();
		} else {
			$cart = [];
			$unique_id = uniqid();
			if (Cookie::get('cart_items') == null) {
				$cart[$unique_id]['product_id'] = $request->pro_id;
				$cart[$unique_id]['quantity'] = $quantity;
				$cart[$unique_id]['price'] = $price;
				$cart[$unique_id]['color'] = $color;
				$cart[$unique_id]['yarn_color'] = $yarn_color;
				$cart[$unique_id]['size'] = $sizes;
				$cart[$unique_id]['clasp'] = $clasp;
				$cart[$unique_id]['surface_amber'] = $surface_amber;
				if($request->certificate) {
					$cart[$unique_id]['certificate'] = $request->certificate;
				}else {
					$cart[$unique_id]['certificate'] = 0;
				}
			} else {
				$cart = (array) json_decode(Cookie::get('cart_items'));
				$cartkey = '';
				$issize = true;

				foreach ($cart as $key => $val) {
					if (
						$val->product_id == $request->pro_id &&
						$val->price == $price &&
						$val->color == $color &&
						$val->yarn_color == $yarn_color &&
						$val->clasp == $clasp &&
						$val->surface_amber == $surface_amber &&
						$val->certificate == $certificate
					) {
						if (count($sizes) == count($val->size)) {
							foreach ($sizes as $size) {
								if (!in_array($size, $val->size)) {
									$issize = false;
									break;
								}
							}
							if ($issize) {
								$cartkey = $key;
								break;
							}
						}
					}
				}
				if ($cartkey) {
					$cart[$cartkey]->quantity = $cart[$cartkey]->quantity + $quantity;
				} else {
					$cart[$unique_id]['product_id'] = $request->pro_id;
					$cart[$unique_id]['quantity'] = $quantity;
					$cart[$unique_id]['price'] = $price;
					$cart[$unique_id]['color'] = $color;
					$cart[$unique_id]['yarn_color'] = $yarn_color;
					$cart[$unique_id]['size'] = $sizes;
					$cart[$unique_id]['clasp'] = $clasp;
					$cart[$unique_id]['surface_amber'] = $surface_amber;
					if($request->certificate) {
						$cart[$unique_id]['certificate'] = $request->certificate;
					}else {
						$cart[$unique_id]['certificate'] = 0;
					}
				}
			}
			Cookie::queue('cart_items', json_encode($cart), 518400);
		}
		$name  = Product::find($request->pro_id)->{'title_' . app()->getLocale()};
		$res = $name . ' Has been Added To your Busket';
		return $res;
	}

	public function adFvrtFromDetails(Request $request)
	{
		$quantity = 1;
		if (auth()->check()) {
			$check_Data = Favourite::where('user_id', auth()->user()->id)
				->where('product_id', $request->pro_id)
				->first();
			if (!$check_Data) {
				$data = new Favourite;
				$data->user_id = auth()->user()->id;
				$data->product_id = $request->pro_id;
				$data->quantity = $quantity;
				$data->save();
			}
		} else {
			$cart = [];
			if (Cookie::get('favourite_items') == null) {
				$cart[$request->pro_id]['quantity'] = $quantity;
			} else {
				$cart = (array) json_decode(Cookie::get('favourite_items'));
				if (!array_key_exists($request->pro_id, $cart)) {
					$cart[$request->pro_id]['quantity'] = $quantity;
				}
			}
			Cookie::queue('favourite_items', json_encode($cart), 518400);
		}
		$name  = Product::find($request->pro_id)->{'title_' . app()->getLocale()};
		$res = $name . ' Has been Added To your Busket';
		return $res;
	}


	public function adToFavourite(Request $request)
	{
		if (auth()->check()) {
			$check_Data = Favourite::where('user_id', auth()->user()->id)
				->where('product_id', $request->pro_id)
				->first();
			if ($check_Data) {
				$existing_qan = $check_Data->quantity;
				$id = $check_Data->id;
				$data  = Favourite::where('id', $id)
					->update(['quantity' => $existing_qan + 1]);
			} else {
				$data = new Favourite;
				$data->user_id = auth()->user()->id;
				$data->product_id = $request->pro_id;
				$data->quantity = 1;
				$data->save();
			}
		} else {
			$cart = [];
			if (Cookie::get('favourite_items') == null) {
				$cart[$request->pro_id]['quan'] = 1;
			} else {
				$cart = (array) json_decode(Cookie::get('favourite_items'));
				if (!array_key_exists($request->pro_id, $cart)) {
					$cart[$request->pro_id]['quan'] = 1;
				}
			}
			Cookie::queue('favourite_items', json_encode($cart), 518400);
		}
		$name  = Product::find($request->pro_id)->{'title_' . app()->getLocale()};
		$res = $name . ' Has been Added To your Busket';
		return $res;
	}
	public function get_combinations($arrays)
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

	public function getP($field, $id, $filter, $chunk_sizes)
	{
		$url = request()->url();
		$page = request()->page ?: 1;
		$filter['sizes'] = $this->get_combinations($filter['sizes']);
        foreach($filter['sizes'] as $key => $size) {
         if(count($size) == 0) {
            unset($filter['sizes'][$key]);
         }
        }

		$data['products'] = Product::where($field, $id)
            ->whereHas('productSizes', function ($q) use ($filter) {
                foreach ($filter['sizes'] as $key => $value) {
                    if (!$key) {
                        $q->whereJsonContains('size_id', $value);
                    } else {
                        $q->orWhereJsonContains('size_id', $value);
                    }
                }
                if ($filter['max_price']) {
                    $q->whereBetween('price', [$filter['min_price'], $filter['max_price']]);
                } else {
                    $q->where('price', '>=', $filter['min_price']);
                }
                return $q;
            })
			->with([
				'productPrice.customColors' => function ($q) use ($filter) {
					foreach ($filter['colors'] as $key => $value) {
						if (!$key) {
							$q->where('id', $value);
						} else {
							$q->orWhere('id', $value);
						}
					}
					return $q;
				},
				'productPrice.YarnColors' => function ($q) use ($filter) {
					foreach ($filter['yarn_colors'] as $key => $value) {
						if (!$key) {
							$q->where('id', $value);
						} else {
							$q->orWhere('id', $value);
						}
					}
					return $q;
				},
				'productPrice.customClasps' => function ($q) use ($filter) {
					foreach ($filter['clasp'] as $key => $value) {
						if (!$key) {
							$q->where('id', $value);
						} else {
							$q->orWhere('id', $value);
						}
					}
					return $q;
				},
				'productPrice.surfaceAmbers' => function ($q) use ($filter) {
					foreach ($filter['surface_amber'] as $key => $value) {
						if (!$key) {
							$q->where('id', $value);
						} else {
							$q->orWhere('id', $value);
						}
					}
					return $q;
				}
			])
			->get();
		if (count($filter['colors']) || count($filter['yarn_colors']) || count($filter['clasp']) || count($filter['surface_amber'])) {

			$data['products'] = $data['products']->filter(function ($item) {
				if (
					$item->productPrice->customColors->count() &&
					$item->productPrice->YarnColors->count() &&
					$item->productPrice->customClasps->count() &&
					$item->productPrice->surfaceAmbers->count()
				) {
					return $item;
				}
			});
		}
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

	public function productM(Request $request, $m, $id)
	{
		$filter['min_price'] = $request->min_price ?: 0;
		$filter['max_price'] = $request->max_price ?: 0;
		$filter['colors'] = $request->color ?: [];
		$filter['yarn_colors'] = $request->yarn_color ?: [];
		$filter['sizes'] = $request->sizes ?: [];
		$filter['clasp'] = $request->clasp ?: [];
		$filter['surface_amber'] = $request->surface_amber ?: [];
		$data = $this->getP('menu_id', $id, $filter, 12);

		$data['menu'] = Menu::find($id);
		$data['menu_t'] = $data['menu'];
		// dd($data['menu']);
		$data['m'] = $m;
		$data['id'] = $id;
		$data['sigments'] = 2;
		$data['discount_products'] = ProductPrice::whereNotNull('discount')->orderBy('discount', 'desc')->limit(9)->with('products')->get();
		$data['url'] = $request->url();
		$data['url_for'] = 'menu_id';
		return view('front-end.pages.products', $data);
	}
	public function paginationRender($request, $id, $menu)
	{
		$filter['min_price'] = $request->min_price ?: 0;
		$filter['max_price'] = $request->max_price ?: 0;
		$filter['colors'] = $request->color ?: [];
		$filter['yarn_colors'] = $request->yarn_color ?: [];
		$filter['sizes'] = $request->sizes ?: [];
		$filter['clasp'] = $request->clasp ?: [];
		$filter['surface_amber'] = $request->surface_amber ?: [];
		$data = $this->getP($menu, $id, $filter, 12);
		return view('front-end.pages.paginate-product', $data)->render();
	}
	public function productFM(Request $request, $m, $id)
	{
		return $this->paginationRender($request, $id, 'menu_id');
	}
	public function productFSM(Request $request, $m, $sm, $id)
	{
		return $this->paginationRender($request, $id, 'sub_menu_id');
	}
	public function productFISM(Request $request, $m, $sm, $ism, $id)
	{
		return $this->paginationRender($request, $id, 'inner_menu_id');
	}
	public function searchResult(Request $request)
	{
		$data['productsSR'] = Product::where('title_lt', 'like', '%' . $request->txt . '%')
			->orWhere('title_en', 'like', '%' . $request->txt . '%')
			->orWhere('title_rus', 'like', '%' . $request->txt . '%')
			// ->get()
			// ->toArray();
			->paginate(12);
		// return $data['products'];
		return view('front-end.pages.paginate-product1', $data)->render();
	}

	public function productSM(Request $request, $m, $sm, $id)
	{
		$filter['min_price'] = $request->min_price ?: 0;
		$filter['max_price'] = $request->max_price ?: 0;
		$filter['colors'] = $request->color ?: [];
		$filter['yarn_colors'] = $request->yarn_color ?: [];
		$filter['sizes'] = $request->sizes ?: [];
		$filter['clasp'] = $request->clasp ?: [];
		$filter['surface_amber'] = $request->surface_amber ?: [];
		$data = $this->getP('sub_menu_id', $id, $filter, 12);

		$data['menu'] = SubMenu::find($id);
		$data['sub_menu_t'] = $data['menu'];
		$data['menu_t'] = Menu::find($data['sub_menu_t']->menu_id);
		$data['m'] = $m;
		$data['sm'] = $sm;
		$data['id'] = $id;
		$data['sigments'] = 2;
		$data['discount_products'] = ProductPrice::whereNotNull('discount')->orderBy('discount', 'desc')->limit(9)->with('products')->get();
		$data['url'] = $request->url();
		$data['url_for'] = 'sub_menu_id';
		return view('front-end.pages.products', $data);
	}
	public function product(Request $request, $m, $sm, $im, $id)
	{
		$filter['min_price'] = $request->min_price ?: 0;
		$filter['max_price'] = $request->max_price ?: 0;
		$filter['colors'] = $request->color ?: [];
		$filter['yarn_colors'] = $request->yarn_color ?: [];
		$filter['sizes'] = $request->sizes ?: [];
		$filter['clasp'] = $request->clasp ?: [];
		$filter['surface_amber'] = $request->surface_amber ?: [];
		$data = $this->getP('inner_menu_id', $id, $filter, 12);

		$data['menu'] = InnerMenu::find($id);
		// dd($data['menu']);
		$data['m'] = $m;
		$data['sm'] = $sm;
		$data['im'] = $im;
		$data['id'] = $id;
		$data['sigments'] = 2;
		$data['discount_products'] = ProductPrice::whereNotNull('discount')->orderBy('discount', 'desc')->limit(9)->with('products')->get();
		$data['url'] = $request->url();
		$data['url_for'] = 'inner_menu_id';
		return view('front-end.pages.products', $data);
	}


	public function productDetails($id)
	{
		$product = Product::find($id);
		$ip = request()->ip();
        if ($ip == '::1' || $ip == '127.0.0.1') {
            $ip = '203.78.146.6';
        }
		$url = 'http://ip-api.com/json/' . $ip;
		$ip_info = file_get_contents($url);
		$user_info = json_decode($ip_info, true);
		$country_code = $user_info['countryCode'];
        // dd($product);
		$tz = $user_info['timezone'];
		if (!$product->is_free_shipping) {
			$shipping = GetCartService::shippingPrice($country_code, $product->weight);

			if(is_numeric($shipping)){
				$data['shipping_price'] = $shipping;
			} else {
				$data['shipping_error'] = $shipping;
			}
		}

		$current_date_time = Carbon::now($tz)->toDateTimeString();


		$product->last_visit_time = $current_date_time;
		$product->save();

		$data['product'] = Product::where('id', $product->id)
			->with([
				'productAltImages',
				'productPrice.customColors',
				'productPrice.surfaceAmbers',
				'productPrice.customClasps',
				'productSizes',
				'menu',
				'subMenu'
			])
			->first();
		if ($data['product']->productSizes) {
			$data['min_price'] = $data['product']->productSizes->min('price');
			$data['max_price'] = $data['product']->productSizes->max('price');
		} else {
			$price = $data['product']->productPrice ? $data['product']->productPrice->price : 0;
			$data['min_price'] = $price;
			$data['max_price'] = $price;
		}

		$data['related_products'] = Product::where('menu_id', $data['product']->menu_id)
			->with([
				'productAltImages',
				'productPrice.customColors',
				'productPrice.surfaceAmbers',
				'productPrice.customClasps',
				'productSizes'
			])
			->get();
			$certificate = Certificate::orderBy('id', 'DESC')->first();
			if($certificate) {
				$data['certificate_price'] = $certificate->price;
			}else {
				$data['certificate_price'] = 0;
			}
		return view('front-end.pages.product-details', $data);
	}

	function getColorSize(Request $request)
	{
		$pcolor = ProductSize::find($request->pro_c_id);
		$data['color'] = '';
		$data['price'] = $pcolor->price;
		foreach ($pcolor->sizes as $size) {
			$data['color'] .= '<option value="' . $size->id  . '">' . $size->{'size_' . app()->getLocale()} . '</option>';
		}
		return $data;
	}

	public function contactUs()
	{
		$data['discount_products'] = ProductPrice::whereNotNull('discount')->orderBy('discount', 'desc')->limit(9)->with('products')->get();
		return view('front-end.pages.contact-us', $data);
	}
	public function aboutUs()
	{
		$data['discount_products'] = ProductPrice::whereNotNull('discount')->orderBy('discount', 'desc')->limit(9)->with('products')->get();
		return view('front-end.pages.about-us', $data);
	}
	public function updateShippingType()
	{
		$certificate = Certificate::orderBy('id', 'DESC')->first();
        if($certificate) {
            $certificate_price = $certificate->price;
        }else {
            $certificate_price = 0;
        }
		$type_id = request('type_id');
		$country_id = request('country_id');

		$carts = GetCartService::cartInfo();
		
		$total_weight = 0;
		$tmp_weight = true;
		$total_price = 0;
		foreach ($carts as $key => $cart) {
			if(($cart['weight'] == NULL || $cart['weight'] == '') && $tmp_weight) {
				$tmp_weight = false;
			}
			if (!$cart['free']) {
				$total_weight += $cart['weight'];
			}
			$total_price += ($cart['price'] * $cart['quantity']) + (($cart['certificate'] ? $certificate_price : 0) * $cart['quantity']);
		}
		if(!$tmp_weight && $total_weight == 0) {
			$total_weight = false;
		}
		$country_code = Country::find($country_id)->code;

		$package = Package::where('package_price', '<=', $total_price)->orderBy('package_price',
			'DESC')->first();
		$price_range_discount = 0;
		if($package) {
			$price_range_discount = ($package->package_discount * $total_price) / 100;
		}

		$shipping = GetCartService::shippingPrice($country_code, $total_weight,$type_id);

		if($shipping && $total_weight !==0){
			$data['shipping_price'] = ((\is_numeric($shipping)) ? '€' : '').$shipping;
		} else {
			$data['shipping_price'] = '<b class="text-success">Free Shipping</b>';
		}
		$user_discount = 0;
		$final_price = $total_price - @$price_range_discount?: 0;
		if(auth()->check()){
			if(auth()->user()->userInfo->discount) {
				$user_discount = ($final_price * auth()->user()->userInfo->discount) / 100;
			}
		}
		if(is_numeric($shipping)){
			$final_price += $shipping;
		}
		$data['sub_total'] = '€'.number_format((float)($final_price - $user_discount), 2, '.', '');
		return $data;
	}
	public function cart()
	{
		$data['discount_products'] = ProductPrice::whereNotNull('discount')
			->orderBy('discount', 'desc')
			->limit(9)
			->with('products')
			->get();
		$data['shipping_types'] = ShippingType::all();

		$carts = GetCartService::cartInfo();
		$total_weight = 0;
		$tmp_weight = true;
		foreach ($carts as $key => $cart) {
			if(($cart['weight'] == NULL || $cart['weight'] == '') && $tmp_weight) {
				$tmp_weight = false;
			}
			if (!$cart['free']) {
				$total_weight += $cart['weight'];
			}
		}
		if(!$tmp_weight && $total_weight == 0) {
			$total_weight = false;
		}
		$data['weight'] = $total_weight;
		$ip = request()->ip();
        if ($ip == '::1' || $ip == '127.0.0.1') {
            $ip = '203.78.146.6';
        }
		$url = 'http://ip-api.com/json/' . $ip;
		$ip_info = file_get_contents($url);
		$user_info = json_decode($ip_info, true);
		$country_code = $user_info['countryCode'];


		$shipping = GetCartService::shippingPrice($country_code, $total_weight);
		if(is_numeric($shipping)){
			$data['shipping_price'] = $shipping;
		} else {
			$data['shipping_error'] = $shipping;
		}


		return view('front-end.pages.cart', $data);
	}
	public function checkout()
	{
		$data['discount_products'] = ProductPrice::whereNotNull('discount')->orderBy('discount', 'desc')->limit(9)->with('products')->get();

		$data['shipping_types'] = ShippingType::all();
		$data['countries'] = Country::all();
		$carts = GetCartService::cartInfo();
		$total_weight = 0;
		$tmp_weight = true;
		foreach ($carts as $key => $cart) {
			if(($cart['weight'] == NULL || $cart['weight'] == '') && $tmp_weight) {
				$tmp_weight = false;
			}
			if (!$cart['free']) {
				$total_weight += $cart['weight'];
			}
		}
		if(!$tmp_weight && $total_weight == 0) {
			$total_weight = false;
		}
		$data['weight'] = $total_weight;
		$ip = request()->ip();
        if ($ip == '::1' || $ip == '127.0.0.1') {
            $ip = '203.78.146.6';
        }
		$url = 'http://ip-api.com/json/' . $ip;
		$ip_info = file_get_contents($url);
		$user_info = json_decode($ip_info, true);
		$country_code = $user_info['countryCode'];

		$data['country_id'] = Country::where('code', $country_code)->first()->id;

		$shipping = GetCartService::shippingPrice($country_code, $total_weight,$data['shipping_types']->first()->id);
		if(is_numeric($shipping)){
			$data['shipping_price'] = $shipping;
		} else {
			$data['shipping_error'] = $shipping;
		}
		return view('front-end.pages.checkout', $data);
	}

	public function deleteFrmCart(Request $request)
	{
		if (auth()->check()) {
			$data = Cart::where('id', $request->pro_id)->delete();
		} else {
			$cart = (array) json_decode(Cookie::get('cart_items'));
			if (array_key_exists($request->pro_id, $cart)) {
				unset($cart[$request->pro_id]);
			}
			Cookie::queue('cart_items', json_encode($cart), 518400);
		}
		return 1;
	}
	public function deleteFrmFavourite(Request $request)
	{
		if (auth()->check()) {
			$data = Favourite::where('product_id', $request->pro_id)->where('user_id', auth()->user()->id)->delete();
		} else {
			$cart = (array) json_decode(Cookie::get('favourite_items'));
			if (array_key_exists($request->pro_id, $cart)) {
				unset($cart[$request->pro_id]);
			}
			Cookie::queue('favourite_items', json_encode($cart), 518400);
		}
		return 1;
	}

	public function updateFrmCart(Request $request)
	{
		if (auth()->check()) {
			$data['pro_info'] = Cart::where('id', $request->pro_id)
				->where('user_id', auth()->user()->id)
				->with('productColor', 'product.productPrice', 'customClasp', 'surfaceAmber', 'sizes')
				->first();
		} else {
			$data['pro_info'] = (array) json_decode(Cookie::get('cart_items'));
			$data['pro_info'] = $data['pro_info'][$request->pro_id];
		}
		$product_id = $data['pro_info']->product_id;
		$data['product'] = Product::where('id', $product_id)
			->with([
				'productAltImages',
				'productPrice.customColors',
				'productPrice.surfaceAmbers',
				'productPrice.customClasps',
				'productSizes'
			])
			->first();
		$data['product_id'] = $request->pro_id;
		$data['name']  = $data['product']->{'title_' . app()->getLocale()};
		$data['color'] = '';
		if ($data['product']->productPrice) {
			if ($data['product']->productPrice->count()) {
    			if (count($data['product']->productPrice->customColors)) {
				    $data['color'] .= '<label>' . __('home.color') . '</label>
				    <select onchange="getPriceByFilterFromCart(' . $product_id . ',' . $data['pro_info']->price . ')" name="color" class="selectpicker form-control">';
					$data['color'] .= '<option value="0">Select an Option</option>';
					foreach ($data['product']->productPrice->customColors as $color) {
						$data['color'] .= '<option value="' . $color->id . '" ' . ($data['pro_info']->color == $color->id ? 'selected' : '') . '>' . $color->{'color_' . app()->getLocale()} . '</option>';
					}
				    $data['color'] .= '</select>';
    			}
			}
		}
		$data['yarn_color'] = '';
		if ($data['product']->productPrice) {
			if ($data['product']->productPrice->count()) {
    			if (count($data['product']->productPrice->yarnColors)) {
				    $data['yarn_color'] .= '<label>' . __('home.yarn_color') . '</label>
				    <select onchange="getPriceByFilterFromCart(' . $product_id . ',' . $data['pro_info']->price . ')" name="yarn_color" class="selectpicker form-control">';
					$data['yarn_color'] .= '<option value="0">Select an Option</option>';
					foreach ($data['product']->productPrice->yarnColors as $color) {
						$data['yarn_color'] .= '<option value="' . $color->id . '" ' . ($data['pro_info']->yarn_color == $color->id ? 'selected' : '') . '>' . $color->{'color_' . app()->getLocale()} . '</option>';
					}
				    $data['yarn_color'] .= '</select>';
    			}
			}
		}
		$data['size'] = '';
		$pro_sizes = json_decode($data['product']->productPrice->size_id);
		if ($pro_sizes) {
			if (is_array($pro_sizes) && count($pro_sizes)) {
				$data['size'] .= '<div class="row mar-0">';
				foreach ($pro_sizes as $sizes) {
					if ($sizes) {
						if (is_array($sizes) && count($sizes)) {
							$size_data = Size::whereIn('id', $sizes)->with('customSize')->get();
							$data['size'] .= '<div class="col-12 pad-0">
							<div class="form-group">
							<label>' . $size_data[0]->customSize->{'name_' . app()->getLocale()} . '</label>
							<select name="size[]" class="selectpicker form-control" onchange="getPriceByFilterFromCart(' . $product_id . ',' . $data['pro_info']->price . ')">
							<option value="0">Select an Option</option>';
							$sizes_cart = is_array($data['pro_info']->size) ? $data['pro_info']->size : [];
							foreach ($size_data as $size) {
								$data['size'] .= '<option value="' . $size->id . '" ' . (in_array($size->id, $sizes_cart) ? 'selected' : '') . '>' . $size->{'size_' . app()->getLocale()} . '</option>';
							}
							$data['size'] .= '</select>
							</div>
							</div>';
						}
					}
				}
				$data['size'] .= '</div>';
			}
		}
		$data['clasp'] = '';
		if ($data['product']->productPrice) {
			if ($data['product']->productPrice->count()) {
    			if (count($data['product']->productPrice->customClasps)) {
				    $data['clasp'] .= '<label>' . __('home.clasp') . '</label>
				    <select onchange="getPriceByFilterFromCart(' . $product_id . ',' . $data['pro_info']->price . ')" name="clasp" class="selectpicker form-control">';
					$data['clasp'] .= '<option value="0">Select an Option</option>';
					foreach ($data['product']->productPrice->customClasps as $clasp) {
						$data['clasp'] .= '<option value="' . $clasp->id . '" ' . ($data['pro_info']->clasp == $clasp->id ? 'selected' : '') . '>' . $clasp->{'name_' . app()->getLocale()} . '</option>';
					}
    			    $data['clasp'] .= '</select>';
				}
			}
		}
		$data['surface_amber'] = '';
		if ($data['product']->productPrice) {
			if ($data['product']->productPrice->count()) {
    			if (count($data['product']->productPrice->surfaceAmbers)) {
				$data['surface_amber'] .= '<label>' . __('home.surface_amber') . '</label>
				<select onchange="getPriceByFilterFromCart(' . $product_id . ',' . $data['pro_info']->price . ')" name="surface_amber" class="selectpicker form-control">';
					$data['surface_amber'] .= '<option value="0">Select an Option</option>';
					foreach ($data['product']->productPrice->surfaceAmbers as $surface_amber) {
						$data['surface_amber'] .= '<option value="' . $surface_amber->id . '" ' . ($data['pro_info']->surface_amber == $surface_amber->id ? 'selected' : '') . '>' . $surface_amber->{'name_' . app()->getLocale()} . '</option>';
					}
    			    $data['surface_amber'] .= '</select>';
				}
			}
		}
		return $data;
	}
	public function updateQuantity(Request $request)
	{
		if (auth()->check()) {
			$data = Cart::where('id', $request->pro_id)
				->where('user_id', auth()->user()->id)->first();
			if ($data) {
				$data->quantity = $request->quantity;
				$data->price = $request->price;
				$data->color = $request->color;
				$data->yarn_color = $request->yarn_color;
				$data->size = $request->size;
				$data->surface_amber = $request->surface_amber;
				$data->clasp = $request->clasp;
				if($request->certificate) {
					$data->certificate = $request->certificate;
				}else {
					$data->certificate = 0;
				}
				$data->save();
			}
			return back();
		} else {
			$cart = (array) json_decode(Cookie::get('cart_items'));
			if (array_key_exists($request->pro_id, $cart)) {
				$cart[$request->pro_id]->quantity = $request->quantity;
				$cart[$request->pro_id]->price = $request->price;
				$cart[$request->pro_id]->color = $request->color;
				$cart[$request->pro_id]->yarn_color = $request->yarn_color;
				$cart[$request->pro_id]->size = $request->size;
				$cart[$request->pro_id]->clasp = $request->clasp;
				$cart[$request->pro_id]->surface_amber = $request->surface_amber;
				if($request->certificate) {
					$cart[$request->pro_id]->certificate = $request->certificate;
				}else {
					$cart[$request->pro_id]->certificate = 0;
				}
			}
			Cookie::queue('cart_items', json_encode($cart), 518400);
			return back();
		}
	}
	public function getPriceByFilter(Request $request)
	{

        $price = ProductPrice::where('pro_id', $request->id)->first();
        if($request->sizes) {
    		$product_size = ProductSize::where('product_id', $request->id)->whereJsonContains('size_id', $request->sizes)->first();
    		$discount = 0;
    		if ($product_size) {
    			if ($price->discount) {
    				$discount = ($product_size->price * $price->discount) / 100;
    			}
    			$price = $product_size->price - $discount;
    		} else {
    			$price = 0;
    		}
        }else {
            $discount = 0;
            if ($price->discount) {
        		$discount = ($price->price * $price->discount) / 100;
    		}
    		$price = $price->price - $discount;
        }
		if (auth()->check()) {
			if (auth()->user()->userInfo->discount) {
				$data['user_discount'] = auth()->user()->userInfo->discount;
			} else {
				$data['user_discount'] = 0;
			}
		} else {
			$data['user_discount'] = 0;
		}
		$data['price'] = $price;
		return $data;
	}
	public function setLanguage($language)
	{
		request()->session()->put('locale', $language);
		return redirect()->back();
	}
}
