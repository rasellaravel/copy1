<?php

namespace App\Services;

use App\Cart;
use App\Country;
use App\Helpers\UrlHelper;
use App\Product;
use App\ProductShippingCategory;
use App\Shipping;
use App\ShippingSetting;
use Cookie;

class GetCartService
{
    public static function authCart($carts, $country_code, $shipping_type, $order_insert)
    {
        $data = [];
        foreach ($carts as $cart) {
            $data[$cart->id]['url'] = route('user.slugUrl', UrlHelper::product($cart->product));
            $data[$cart->id]['product_id'] = $cart->product_id;
            $data[$cart->id]['product_title'] = $cart->product->{'title_' . app()->getLocale()};
            $data[$cart->id]['product_img'] = $cart->product->product_img;
            $data[$cart->id]['quantity'] = $cart->quantity;
            $data[$cart->id]['price'] = number_format((float) $cart->price, 2, '.', '');
            $data[$cart->id]['vendor_id'] = $cart->product->vendor_id;
            $data[$cart->id]['shipping'] = self::shippingPrice($country_code, $cart->product, $shipping_type, $cart->quantity);
            if ($order_insert == null) {
                $data[$cart->id]['color'] = '';
                if ($cart->product->productPrice) {
                    foreach ($cart->product->productPrice->customColors as $value) {
                        if ($value->id == $cart->color) {
                            $data[$cart->id]['color'] = 'Color : ' . $value->{'color_' . app()->getLocale()};
                        }
                    }
                }
            } else {
                $data[$cart->id]['color'] = [];
                $data[$cart->id]['color']['en'] = '';
                $data[$cart->id]['color']['lt'] = '';
                $data[$cart->id]['color']['rus'] = '';
                $data[$cart->id]['color']['es'] = '';
                $data[$cart->id]['color']['pt'] = '';

                if ($cart->product->productPrice) {
                    foreach ($cart->product->productPrice->customColors as $value) {
                        if ($value->id == $cart->color) {
                            $data[$cart->id]['color']['en'] = 'Color : ' . $value->color_en;
                            $data[$cart->id]['color']['lt'] = 'Color : ' . $value->color_lt;
                            $data[$cart->id]['color']['rus'] = 'Color : ' . $value->color_rus;
                            $data[$cart->id]['color']['es'] = 'Color : ' . $value->color_es;
                            $data[$cart->id]['color']['pt'] = 'Color : ' . $value->color_pt;
                        }
                    }
                }
            }

            if ($order_insert == null) {
                $data[$cart->id]['size'] = '';
                $n = 1;
                foreach ($cart->sizes as $key => $size) {
                    $data[$cart->id]['size'] .= $size->customSize->{'name_' . app()->getLocale()} . ": " . $size->{'size_' . app()->getLocale()};
                    if (count($cart->size) != $n++) {
                        $data[$cart->id]['size'] .= ', ';
                    }
                }
            } else {
                $data[$cart->id]['size'] = [];
                $data[$cart->id]['size']['en'] = '';
                $data[$cart->id]['size']['lt'] = '';
                $data[$cart->id]['size']['rus'] = '';
                $data[$cart->id]['size']['es'] = '';
                $data[$cart->id]['size']['pt'] = '';
                $n = 1;
                foreach ($cart->sizes as $key => $size) {
                    $data[$cart->id]['size']['en'] .= $size->customSize->name_en . ": " . $size->size_en;
                    $data[$cart->id]['size']['lt'] .= $size->customSize->name_lt . ": " . $size->size_lt;
                    $data[$cart->id]['size']['rus'] .= $size->customSize->name_rus . ": " . $size->size_rus;
                    $data[$cart->id]['size']['es'] .= $size->customSize->name_es . ": " . $size->size_es;
                    $data[$cart->id]['size']['pt'] .= $size->customSize->name_pt . ": " . $size->size_pt;
                    if (count($cart->size) != $n++) {
                        $data[$cart->id]['size']['en'] .= ', ';
                        $data[$cart->id]['size']['lt'] .= ', ';
                        $data[$cart->id]['size']['rus'] .= ', ';
                        $data[$cart->id]['size']['es'] .= ', ';
                        $data[$cart->id]['size']['pt'] .= ', ';
                    }
                }
            }
        }
        return $data;
    }
    public static function cookieCart($carts, $country_code, $shipping_type, $order_insert)
    {
        $data = [];
        foreach ($carts as $key => $item) {
            $product = Product::where('id', $item->product_id)
                ->with('productPrice', 'productSizes.sizes')
                ->first();
            if ($product) {
                $data[$key]['url'] = route('user.slugUrl', UrlHelper::product($product));
                $data[$key]['product_id'] = $item->product_id;
                $data[$key]['product_title'] = $product->{'title_' . app()->getLocale()};
                $data[$key]['product_img'] = $product->product_img;
                $data[$key]['quantity'] = $item->quantity;
                $data[$key]['price'] = number_format((float) $item->price, 2, '.', '');
                $data[$key]['vendor_id'] = $product->vendor_id;
                $data[$key]['shipping'] = self::shippingPrice($country_code, $product, $shipping_type, $item->quantity);
                $data[$key]['cart_files'] = @$item->cart_files;
                if ($order_insert == null) {
                    $data[$key]['color'] = '';

                    if ($product->productPrice) {
                        foreach ($product->productPrice->customColors as $value) {
                            if ($value->id == $item->color) {
                                $data[$key]['color'] = 'Color : ' . $value->{'color_' . app()->getLocale()};
                            }
                        }
                    }
                } else {
                    $data[$key]['color'] = [];
                    $data[$key]['color']['en'] = '';
                    $data[$key]['color']['lt'] = '';
                    $data[$key]['color']['rus'] = '';
                    $data[$key]['color']['es'] = '';
                    $data[$key]['color']['pt'] = '';

                    if ($product->productPrice) {
                        foreach ($product->productPrice->customColors as $value) {
                            if ($value->id == $item->color) {
                                $data[$key]['color']['en'] = 'Color : ' . $value->color_en;
                                $data[$key]['color']['lt'] = 'Color : ' . $value->color_lt;
                                $data[$key]['color']['rus'] = 'Color : ' . $value->color_rus;
                                $data[$key]['color']['es'] = 'Color : ' . $value->color_es;
                                $data[$key]['color']['pt'] = 'Color : ' . $value->color_pt;
                            }
                        }
                    }
                }

                if ($order_insert == null) {
                    $data[$key]['size'] = '';
                    $n = 1;
                    if ($product->productSizes) {
                        foreach ($product->productSizes as $sizes) {
                            foreach ($sizes->sizes as $size) {
                                if (in_array($size->id, $item->size)) {
                                    $data[$key]['size'] .= $size->customSize->{'name_' . app()->getLocale()} . ": " . $size->{'size_' . app()->getLocale()};
                                    if (count($item->size) != $n++) {
                                        $data[$key]['size'] .= ', ';
                                    }
                                }
                            }
                        }
                    }
                } else {
                    $data[$key]['size'] = [];
                    $data[$key]['size']['en'] = '';
                    $data[$key]['size']['lt'] = '';
                    $data[$key]['size']['rus'] = '';
                    $data[$key]['size']['es'] = '';
                    $data[$key]['size']['pt'] = '';
                    $n = 1;
                    if ($product->productSizes) {
                        foreach ($product->productSizes as $sizes) {
                            foreach ($sizes->sizes as $size) {
                                if (in_array($size->id, $item->size)) {
                                    $data[$key]['size']['en'] .= $size->customSize->name_en . ": " . $size->size_en;
                                    $data[$key]['size']['lt'] .= $size->customSize->name_lt . ": " . $size->size_lt;
                                    $data[$key]['size']['rus'] .= $size->customSize->name_rus . ": " . $size->size_rus;
                                    $data[$key]['size']['es'] .= $size->customSize->name_es . ": " . $size->size_es;
                                    $data[$key]['size']['pt'] .= $size->customSize->name_pt . ": " . $size->size_pt;
                                    if (count($item->size) != $n++) {
                                        $data[$key]['size']['en'] .= ', ';
                                        $data[$key]['size']['lt'] .= ', ';
                                        $data[$key]['size']['rus'] .= ', ';
                                        $data[$key]['size']['es'] .= ', ';
                                        $data[$key]['size']['pt'] .= ', ';
                                    }
                                }
                            }
                        }
                    }
                }

            }
        }
        return $data;
    }
    public static function shippingPrice($country_code, $product, $type = null, $quantity = 1)
    {
        $product_weight = $product->weight;
        $shipping_category_id = $product->shipping_category_id;
        $vendor_id = $product->vendor_id;
        $country_id = Country::where('code', $country_code)->first()->id;
        //rasel

        $checkTypeId = Shipping::where('country_id', $country_id)
            ->where('vendor_id', $vendor_id)
            ->where('shipping_category_id', $shipping_category_id)
            ->where('shipping_type_id', $type)
            ->first();
        

        if(!$checkTypeId){
            $getShippingCategory = ProductShippingCategory::where('product_id', $product->id)
            ->where('type_id', $type)->first();
            if($getShippingCategory){
                $shipping_category_id = $getShippingCategory->shipping_category_id;
            }
        }    

        //return $shipping_category_id;

        
        //end rasel
        if (Shipping::where('country_id', $country_id)->where('vendor_id', $vendor_id)->exists()) {
            $shipping_cost = Shipping::where('country_id', $country_id)
                ->where('vendor_id', $vendor_id)
                ->where('shipping_category_id', $shipping_category_id)
                ->when($type != null, function ($query) use ($type) {
                    return $query->where('shipping_type_id', $type);
                })->first();
            if ($shipping_cost) {
                $shipping_setting = ShippingSetting::first();
                if ($product->is_free_shipping && $shipping_setting->min_item <= $quantity) {
                    return 0;
                } else {
                    if ($product->weight) {
                        $total_weight = $product->weight * $quantity;
                        if ($shipping_cost->max_weight >= $total_weight) {
                            return $shipping_cost->price;
                        }
                        $weight_diff = ceil($total_weight - $shipping_cost->max_weight) * $shipping_cost->additional_weight_price;
                        return $shipping_cost->price + $weight_diff;
                    } else {
                        if ($quantity == 1) {
                            return $shipping_cost->price;
                        }
                        $extra = ($quantity - 1) * $shipping_cost->additional_price;
                        return $shipping_cost->price + $extra;
                    }
                }
            } else {
                return ['type' => 'type', 'item' => $product->{'title_' . app()->getLocale()}];
            }
        } else {
            return ['type' => 'country', 'item' => $product->{'title_' . app()->getLocale()}];
        }
    }

    public static function cartInfo($shipping_type = null, $country_code = null, $order_insert = null)
    {
        if ($country_code == null) {
            $ip = request()->ip();
            if ($ip == '::1' || $ip == '127.0.0.1') {
                $ip = '203.78.146.6';
            }
            $url = 'http://ip-api.com/json/' . $ip;
            $ip_info = file_get_contents($url);
            $user_info = json_decode($ip_info, true);
            $country_code = $user_info['countryCode'];
        }
        if (auth()->check()) {
            $carts = Cart::where('user_id', auth()->user()->id)
                ->with('product.productPrice', 'sizes.customSize')
                ->get();
            $carts = self::authCart($carts, $country_code, $shipping_type, $order_insert);
        } else {
            $carts = (array) json_decode(Cookie::get('cart_items'));
            $carts = self::cookieCart($carts, $country_code, $shipping_type, $order_insert);
        }
        return $carts;
    }
    public static function cartData()
    {
        $carts = (array) json_decode(Cookie::get('cart_items'));
        return $carts;
    }
}
