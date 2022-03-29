<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Country;
use App\Exports\ProductExport;
use App\Favourite;
use App\Helpers\PriceHelper;
use App\Http\Controllers\Controller;
use App\Product;
use App\Services\GetCartService;
use App\Services\RivileService;
use App\Shipping;
use App\ShippingType;
use App\Size;
use Cookie;
use Illuminate\Http\Request;
use Session;
use Excel;

class CartController extends Controller
{
    public function wishlist()
    {
        if (auth()->check()) {
            $favorites = Favourite::where('user_id', auth()->user()->id)
                ->pluck('product_id');
            $data['favorites'] = Product::whereIn('id', $favorites)
                ->with('productPrice')
                ->get();
        } else {
            $favorites = (array) json_decode(Cookie::get('favorite_items'));
            $ids = array_keys($favorites);
            $data['favorites'] = Product::whereIn('id', $ids)
                ->with('productPrice')
                ->get();
        }
        return view('front-end.pages.wishlist');
    }
    public function addFavorite(Request $request)
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
            if (Cookie::get('favorite_items') == null) {
                $cart[$request->pro_id]['quantity'] = $quantity;
            } else {
                $cart = (array) json_decode(Cookie::get('favorite_items'));
                if (!array_key_exists($request->pro_id, $cart)) {
                    $cart[$request->pro_id]['quantity'] = $quantity;
                }
            }
            Cookie::queue('favorite_items', json_encode($cart), 518400);
        }
        return 'true';
    }
    public function deleteFavorite(Request $request)
    {
        if (auth()->check()) {
            $data = Favourite::where('product_id', $request->pro_id)->where('user_id', auth()->user()->id)->delete();
        } else {
            $cart = (array) json_decode(Cookie::get('favorite_items'));
            if (array_key_exists($request->pro_id, $cart)) {
                unset($cart[$request->pro_id]);
            }
            Cookie::queue('favorite_items', json_encode($cart), 518400);
        }
        return redirect()->back();
    }
    public function addCart(Request $request)
    {
        $quantity = @$request->quantity ?: 1;
        $price = @$request->price ?: 0;
        $color = @$request->color ?: '';
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
                ->when($color, function ($q) use ($color) {
                    return $q->where('color', $color);
                })
                ->when($sizes, function ($q) use ($sizes) {
                    return $q->where('size', json_encode($sizes));
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
            $data->size = $sizes;
            $data->save();
        } else {
            $cart = [];
            $unique_id = uniqid();
            if (Cookie::get('cart_items') == null) {
                $cart[$unique_id]['product_id'] = $request->pro_id;
                $cart[$unique_id]['quantity'] = $quantity;
                $cart[$unique_id]['price'] = $price;
                $cart[$unique_id]['color'] = $color;
                $cart[$unique_id]['size'] = $sizes;
            } else {
                $cart = (array) json_decode(Cookie::get('cart_items'));
                $cartkey = '';
                $issize = true;

                foreach ($cart as $key => $val) {
                    if (
                        $val->product_id == $request->pro_id &&
                        $val->price == $price &&
                        $val->color == $color
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
                    $cart[$unique_id]['size'] = $sizes;
                }
            }
            Cookie::queue('cart_items', json_encode($cart), 518400);
        }
        return 'true';

    }

    public function cart()
    {

        return Excel::download(new ProductExport, 'invoices.xlsx');
        
        // $rivile = new RivileService();
        // return $rivile->createCustomer('addd');
        $ip = request()->ip();
        if ($ip == '::1' || $ip == '127.0.0.1') {
            $ip = '103.136.96.254';
        }
        $url = 'http://ip-api.com/json/' . $ip;
        $ip_info = file_get_contents($url);
        $user_info = json_decode($ip_info, true);
        $country_code = $user_info['countryCode'];
        $data['country_id'] = Country::where('code', $country_code)->first()->id;
        return view('front-end.pages.cart', $data);
    }

    public function UploadCartFile(Request $request)
    {
        $files = $request->file('files');
        $upload_path = 'uploads/order_files/';
        $cart = (array) json_decode(Cookie::get('cart_items'), true);
        $cart_files = [];
        $cart_files = @$cart[$request->cart_key]["cart_files"];
        if(count($files) > 0){
            foreach($files as $file){
                $name = time().'-'.rand().'.'.$file->getClientOriginalExtension();
                $file->move($upload_path, $name);
                array_push($cart_files, $name);
            }
            $cart[$request->cart_key]["cart_files"] = $cart_files;
            Cookie::queue('cart_items', json_encode($cart), 518400);
        }
        return back();

    }



    public function updateCartItem(Request $request)
    {
        if (auth()->check()) {
            $cart = Cart::where('id', $request->pro_id)
                ->where('user_id', auth()->user()->id)
                ->with('product.productPrice', 'sizes')
                ->first();
        } else {
            $cart = (array) json_decode(Cookie::get('cart_items'));
            $cart = $cart[$request->pro_id];
        }
        $product_id = $cart->product_id;
        $product = Product::where('id', $product_id)
            ->with('productSizes.sizes', 'productPrice', 'menu')
            ->first();
        $data['cart'] = $cart;
        $data['id'] = $request->pro_id;
        $data['size'] = '';
        $data['color'] = '';
        //$data['price'] = PriceHelper::discount($product);
        $data['price'] = $request->totalItemPrice;
        
        $data['name'] = $product->{'title_' . app()->getLocale()};
        $data['quantity'] = '<label class="m-0">' .
        'Quantity :' .
        '</label>' .
        '<input class="form-control mb-2" type="number" min="1" step="1" value="' . $cart->quantity . '" name="quantity" onchange="getPriceByFilter(event, ' . $product->id . ', ' . PriceHelper::discount($product) . ')">';
        $error_check = 1;
        if ($product->productPrice) {
            $pro_sizes = json_decode($product->productPrice->size_id);
            if ($product->productPrice->size_id) {
                $error_check = 0;
                if (is_array($pro_sizes) && count($pro_sizes)) {
                    foreach ($pro_sizes as $sizes) {
                        if ($sizes) {
                            if (is_array($sizes) && count($sizes)) {
                                $size_data = Size::whereIn('id', $sizes)
                                    ->with('customSize')
                                    ->get();
                                $data['size'] .= '<label class="m-0">' .
                                $size_data[0]->customSize->{'name_' . app()->getLocale()} . ' :' .
                                '</label>' .
                                '<select name="size[]" class="form-control mb-2" onchange="getPriceByFilter(event, ' . $product->id . ', ' . PriceHelper::discount($product) . ')">' .
                                    '<option value="0">Select an Option</option>';
                                foreach ($size_data as $size) {
                                    $data['size'] .= '<option value="' . $size->id . '"' . (in_array($size->id, $cart->size) ? 'selected' : '') . '>' .
                                    $size->{'size_' . app()->getLocale()} .
                                        '</option>';
                                }
                                $data['size'] .= '</select>';
                            }
                        }
                    }
                }
            }
            if ($product->productPrice->custom_color_id) {
                $error_check = 0;
                if (is_array($product->productPrice->custom_color_id) && count($product->productPrice->custom_color_id)) {
                    $data['color'] .= '<label class="m-0">Color :</label>' .
                    '<select name="color" class="form-control mb-2"
                                onchange="getPriceByFilter(event, ' . $product->id . ', ' . PriceHelper::discount($product) . ')">' .
                        '<option value="0">Select an Option</option>';
                    foreach ($product->productPrice->customColors as $color) {
                        $data['color'] .= '<option value="' . $color->id . '"' . ($color->id == $cart->color ? 'selected' : '') . '>' .
                        $color->{'color_' . app()->getLocale()} .
                            '</option>';
                    }
                    $data['color'] .= '</select>';
                }
            }
        }
        return $data;
    }
    public function updateCartItemById(Request $request)
    {
        if (auth()->check()) {
            $data = Cart::where('id', $request->pro_id)
                ->where('user_id', auth()->user()->id)->first();
            if ($data) {
                $data->quantity = $request->quantity;
                $data->price = $request->price;
                $data->color = $request->color;
                $data->size = $request->size;
                $data->save();
            }
            return back();
        } else {
            $cart = (array) json_decode(Cookie::get('cart_items'));
            if (array_key_exists($request->pro_id, $cart)) {
                $cart[$request->pro_id]->quantity = $request->quantity;
                $cart[$request->pro_id]->price = $request->price;
                $cart[$request->pro_id]->color = $request->color;
                $cart[$request->pro_id]->size = $request->size;
            }
            Cookie::queue('cart_items', json_encode($cart), 518400);
            return back();
        }
    }
    public function deleteCart($id)
    {
        if (auth()->check()) {
            $data = Cart::where('id', $id)->delete();
        } else {
            $cart = (array) json_decode(Cookie::get('cart_items'));
            if (array_key_exists($id, $cart)) {
                unset($cart[$id]);
            }
            Cookie::queue('cart_items', json_encode($cart), 518400);
        }
        return back();
    }
    public function checkout()
    {
        if (session()->has('country')) {
            $country = session()->get('country');
            $country_code = $country->code; 
        } else {
            $ip = request()->ip();
            if ($ip == '::1' || $ip == '127.0.0.1') {
                $ip = '203.78.146.6';
            }
            $url = 'http://ip-api.com/json/' . $ip;
            $ip_info = file_get_contents($url);
            $user_info = json_decode($ip_info, true);
            $country_code = $user_info['countryCode'];
            $country = Country::where('code', $country_code)->first();
        }
        $data['shipping_types'] = ShippingType::all();
        $data['countries'] = Country::all();
        $data['country_id'] = $country->id;
        $data['country_name'] = $country->name;
        if (session()->has('type_id')) {
            $data['type_id'] = session()->get('type_id');
            foreach ($data['shipping_types'] as $value) {
                if ($value->id == session()->get('type_id')) {
                    $data['type_name'] = $value->type;
                }
            }
        } else {
            //dd($country);

            $data['type_id'] = Shipping::where('country_id', $country->id)->first()->shipping_type_id;
            
            $data['type_name'] = (!$data['type_id']) ? Shipping::first() : $data['type_id'];
        }
        $carts = GetCartService::cartInfo($data['type_id']);
        $data['carts'] = [];
        $data['is_checked'] = [];

        foreach ($carts as $key => $item) {
            $data['carts'][$item['vendor_id']][$key] = $item;
            if (!session()->has('is_checked')) {
                $data['is_checked'][$item['vendor_id']] = 1;
            }
        }
        if (!count($data['carts'])) {
            return redirect()->back();
        }
        if (session()->has('is_checked')) {
            $data['is_checked'] = session()->get('is_checked');
        }
        request()->session()->put('type_id', $data['type_id']);
        request()->session()->put('cart_checked', $data['is_checked']);
        return view('front-end.pages.checkout', $data);
    }
    public function filterCart( Request $request)
    {
        $country = Country::where('id', request()->shipping_country)->first();
        $data['shipping_types'] = ShippingType::all();
        $data['country_id'] = $country->id;
        $data['country_name'] = $country->name;
        $data['type_id'] = request()->shipping_type;
        foreach ($data['shipping_types'] as $value) {
            if ($value->id == request()->shipping_type) {
                $data['type_name'] = $value->type;
            }
        }
        $data['countries'] = Country::all();
        $carts = GetCartService::cartInfo(request()->shipping_type, $country->code);
        $data['carts'] = [];
        $data['is_checked'] = [];
        foreach ($carts as $key => $item) {
            $data['carts'][$item['vendor_id']][$key] = $item;
            if (in_array($item['vendor_id'], request()->is_checked)) {
                $data['is_checked'][$item['vendor_id']] = 1;
            } else {
                $data['is_checked'][$item['vendor_id']] = 0;
            }
        }

        request()->session()->put('cart_checked', $data['is_checked']);

        $res['html'] = view('front-end.pages.cart.cart-partial', $data)->render();
        $res['country'] = $data['country_name'];
        $res['type_name'] = @$data['type_name'];
        $res['type_id'] = @$data['type_id'];
        $res['country_id'] = @$data['country_id'];
        return $res;
    }

}
