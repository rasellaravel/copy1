<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Country;
use App\Http\Controllers\Controller;
use App\Order;
use App\Paysera\WebToPay;
use App\Product;
use App\Services\GetCartService;
use App\Setting;
use App\Shipping;
use App\User;
use App\UserInformation;
use Auth;
use Cookie;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;

class PayseraController extends Controller
{
    public function goPaysera(Request $request)
    {
        $country = Country::where('id', request()->country_id)->first();
        $data['country'] = $country;
        $data['type_id'] = request()->type_id;

        $shipping_error = 0;

        $carts_data = GetCartService::cartInfo(request()->type_id, $country->code, 'order');
        $carts = [];
        $data['is_checked'] = request()->session()->get('cart_checked');
        foreach ($carts_data as $key => $item) {
            if (request()->session()->get('cart_checked')[$item['vendor_id']]) {
                $carts[$item['vendor_id']][$key] = $item;
                if (is_array($item['shipping'])) {
                    $shipping_error = 1;
                }
            }
        }

        $customMsg = [
            'name.required' => __('_lan.name.required'),
            'name.max' => __('_lan.name.max'),
            'lastname.required' => __('_lan.lastname.required'),
            'lastname.max' => __('_lan.lastname.max'),
            'st_address.required' => __('_lan.st_address.required'),
            'apartment.required' => __('_lan.apartment.required'),
            'town.required' => __('_lan.town.required'),
            'district.required' => __('_lan.district.required'),
            'country.required' => __('_lan.country.required'),
            'post_code.required' => __('_lan.post_code.required'),
            'phone.required' => __('_lan.phone.required'),
            'remail.required' => __('_lan.remail.required'),
            'remail.email' => __('_lan.remail.email'),
            'remail.max' => __('_lan.remail.max'),
            'remail.unique' =>  __('_lan.remail.unique'),
            'rpassword.confirmed' => __('_lan.rpassword.confirmed'),
            'rpassword.min' => __('_lan.rpassword.min'),
            'Vardas_Pavardė.required' => __('_lan.name.required'),
            'Vardas_Pavardė.max' =>  __('_lan.name.max'),
            'Paštomatas.required' =>  __('_lan.Paštomatas.required'),
            'Paštomatas.max' => __('_lan.Paštomatas.max'),
            'Telefono_numeris.required' => __('_lan.phone.required'),
            'El_Paštas.required' => __('_lan.remail.required'),
            'El_Paštas.email' => __('_lan.remail.email'),
            'set_password.required' => __('_lan.set_password.required'),
            'set_password.min' => __('_lan.rpassword.min'),
            'company_name.required' => __('_lan.company_name.required'),
            'company_id.required' => __('_lan.company_id.required'),
        ];

        if ($request->has('remail')) {
            $validator = Validator::make(request()->all(), [
                'name' => ['required', 'string', 'max:255'],
                'remail' => ['required', 'email', 'max:255', 'unique:users,email'],
                'rpassword' => ['required', 'string', 'min:8', 'confirmed'],
                'lastname' => ['required', 'string', 'max:255'],
                'st_address' => ['required'],
                'apartment' => ['required'],
                'town' => ['required'],
                'district' => ['required'],
                'country' => ['required'],
                'post_code' => ['required'],
                'phone' => ['required'],
                'company_name' => ['required'],
                'company_id' => ['required'],
            ], $customMsg);
            $attributeNames = array(
                'remail' => 'email',
                'rpassword' => 'password',
            );
            $validator->setAttributeNames($attributeNames);
        } else {
            $validator = Validator::make(request()->all(), [
                'name' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'st_address' => ['required'],
                'apartment' => ['required'],
                'town' => ['required'],
                'district' => ['required'],
                'country' => ['required'],
                'post_code' => ['required'],
                'phone' => ['required'],
                'company_name' => ['required'],
                'company_id' => ['required'],
            ],$customMsg);
        }
        
        if ($validator->fails()) {
            $validator->errors()->add('tab', 2);
            return redirect()->back()
                ->with($data)
                ->withErrors($validator)
                ->withInput();
        }
        

        if ($shipping_error) {
            return redirect()->back()
                ->with($data)
                ->withInput()
                ->withErrors(['payment_error' => 1]);
        }

        $order_id = uniqid();
        $order_details['company_name'] = $request->company_name;
        $order_details['company_id'] = $request->company_id;
        $order_details['company_vat'] = $request->company_vat;
        $order_details['company_address'] = $request->company_address;
        $order_details['others'] = $request->others;

        $order_details['name'] = $request->name;
        $order_details['lastname'] = $request->lastname ;
        $order_details['apartment'] = $request->apartment ;
        $order_details['post_machine'] = $request->Paštomatas;
        $order_details['street_address'] =  $request->st_address;
        $order_details['town'] = $request->town;
        $order_details['district'] = $request->district;
        $order_details['country'] = $request->country;
        $order_details['post_code'] = $request->post_code;
        $order_details['phone'] = $request->phone;

        $order_details['email'] = $request->remail ? $request->remail : auth()->user()->email;
        
        
        $order_details['order_note'] = $request->order_note;
        $order_details['order_id'] = $order_id;
        $order_details['payment_method'] = $request->payment_method;
        $order_details['shipping_type'] = $request->shipping_type;
        // $order_details['paytype'] = $request->paytype;

        $order_vendor = [];
        $order_product = [];
        $sub_total = 0;
        $n = 0;
        foreach ($carts as $key => $value) {
            $vendor_total = 0;
            $vendor_shipping = 0;
            $m = 0;
            foreach ($value as $key1 => $item) {
                $vendor_total += $item['price'] * $item['quantity'];
                $vendor_shipping += $item['shipping'];
                $order_product[$key][$m]['product_id'] = $item['product_id'];
                $order_product[$key][$m]['quantity'] = $item['quantity'];
                $order_product[$key][$m]['color_en'] = $item['color']['en'];
                $order_product[$key][$m]['color_lt'] = $item['color']['lt'];
                $order_product[$key][$m]['color_rus'] = $item['color']['rus'];
                $order_product[$key][$m]['color_es'] = $item['color']['es'];
                $order_product[$key][$m]['color_pt'] = $item['color']['pt'];
                $order_product[$key][$m]['size_en'] = $item['size']['en'];
                $order_product[$key][$m]['size_lt'] = $item['size']['lt'];
                $order_product[$key][$m]['size_rus'] = $item['size']['rus'];
                $order_product[$key][$m]['size_es'] = $item['size']['es'];
                $order_product[$key][$m]['size_pt'] = $item['size']['pt'];
                $order_product[$key][$m]['price'] = number_format((float) $item['price'], 2, '.', '');
                $order_product[$key][$m]['total'] = number_format((float) $item['price'] * $item['quantity'], 2, '.', '');
                $m++;
            }
        
            $shipping_get = Shipping::where('vendor_id', $key)
                ->where('country_id', $request->country_id)
                ->get();
            if ($shipping_get->max('max_price') < $vendor_shipping) {
                $vendor_shipping = $shipping_get->max('max_price');
            }
            
            $order_vendor[$n]['vendor_id'] = $key;
            $order_vendor[$n]['total'] = number_format((float) $vendor_total + $vendor_shipping, 2, '.', '');
            $order_vendor[$n]['shipping_cost'] = number_format((float) $vendor_shipping, 2, '.', '');
            $n++;
            $sub_total += $vendor_total + $vendor_shipping;
        }
        
        $setting = Setting::orderBy('id', 'DESC')->first();
        $sub_total = $sub_total < $setting->min_price ? $sub_total + $setting->maintenance_charge : $sub_total;
        if ($sub_total < $setting->min_price) {
            $order_details['maintenance_charge'] = number_format((float) $setting->maintenance_charge, 2, '.', '');
        }
        $order_details['total'] = number_format((float) $sub_total, 2, '.', '');

        Session::put('order_details', $order_details);
        Session::put('order_product', $order_product);
        Session::put('order_vendor', $order_vendor);
        $makePassword = ($request->remail) ? $request->rpassword : '';
        Session::put('order_password', $makePassword);
        $this->storeSessionOrder();
        if ($request->payment_method == 'paysera') {
            try {
                $self_url = $this->get_self_url();
                $paysera_ammount = $order_details['total'] * 100;
                $request = WebToPay::redirectToPayment(array(
                    'projectid' => env("PAYSERA_PROJECT_ID"),
                    'sign_password' => env("PAYSERA_SIGN_PASSWORD"),
                    'orderid' => $order_id,
                    'amount' => $paysera_ammount,
                    'currency' => 'EUR',
                    'country' => 'LT',
                    'accepturl' => $self_url .'paysera/accept',
                    'cancelurl' => $self_url .'paysera/cancel',
                    'callbackurl' => $self_url .'payseracallback',
                    'test' => env("PAYSERA_PAY_MODE"),
                ));
                return redirect($request);
                //return response()->json(['payment_method' => 'paysera', 'redirect_url' => $request]);
                //return redirect('paysera/accept');
            } catch (WebToPayException $e) {
                // handle exception
            }
        } elseif ($request->payment_method == 'stripe') {
            \Stripe\Stripe::setApiKey('sk_test_QYIZ5JBIdfGglZi84PA46PEN00WSoaoxnH');
            $session = \Stripe\Checkout\Session::create([
                'customer_email' => $request->remail ?: auth()->user()->email,
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'name' => 'Total Price',
                        'amount' => (float) $order_details['total'] * 100,
                        'currency' => 'eur',
                        'quantity' => 1,
                    ],
                ],
                'success_url' => url('paysera/accept'),
                'cancel_url' => url('paysera/cancel'),
            ]);
            return response()->json(['payment_method' => 'stripe', 'redirect_url' => $session]);
        } else {
            return 'worng payment getway';
        }
    }

    public function storeSessionOrder(){
        if (!Session::has('order_details')) return false;
        $user_id = '';
        $order_details = Session::get('order_details');
        $order_product = Session::get('order_product');
        $order_vendor = Session::get('order_vendor');
        $order_password = Session::get('order_password');

        if (!auth()->check()) {
            $check_user = User::where('email', $order_details['email'])->first();
            if ($check_user) {
                $user_id = $check_user->id;
            } else {
                $user = new User();
                $user->name = $order_details['name'];
                $user->email = $order_details['email'];
                $user->password = Hash::make($order_password);
                $user->save();
                $user_id = $user->id;
                $info = new UserInformation;
                $info->user_id = $user_id;
                $info->save();
            }
        } else {
            $user_id = auth()->user()->id;
        }
        $order_details['user_id'] = $user_id;
        $checkOrderExist = Order::where('order_id',$order_details['order_id'])->first();
        if($checkOrderExist){
            $paid = Order::find($checkOrderExist->id);
            $paid->is_paid = 1;
            $paid->save();
        }else{
            $order_details['is_paid'] = 0;
            $order_set = Order::create($order_details);
            foreach ($order_vendor as $key => $value) {
                $order_vendor_set = $order_set->ordered_vendor()->create($value);
                foreach ($order_product[$value['vendor_id']] as $item) {
                    $order_vendor_set->ordered_product()->create($item);
                }
            }
        }
        $this->saveUserInfo($order_details, $user_id);
        return $user_id;
    }

    public function removeSessonOrder(){
        Cookie::queue('cart_items', '', -518400);
        Session::forget('order_details');
        Session::forget('order_product');
        Session::forget('order_vendor');
        Session::forget('order_password');
    }
    public function payseraAccept( Request $request )
    {
        $order_details = Session::get('order_details');
        $params = [];
        if($order_details['payment_method'] == 'paysera'){
            if($request->data && $request->data != '') parse_str(base64_decode(strtr($request->data, ['-' => '+', '_' => '/'])), $params);
            if(!array_key_exists('projectid',$params) || @$params['projectid'] != env("PAYSERA_PROJECT_ID")) return redirect('/');
        }
        $saveSessionOrder = $this->storeSessionOrder();
        if($saveSessionOrder){ 
            $this->removeSessonOrder();
            if (!auth()->check()) Auth::loginUsingId($saveSessionOrder);
            return redirect()->route('profile')->with(['tab' => 4]); 
        } else{ 
            return redirect('/'); 
        }

    }
    public function saveUserInfo($order, $user_id)
    {   
        $check = UserInformation::where('user_id', $user_id)->first();
        $user = ($check) ? UserInformation::find($check->id) : new UserInformation();
        $user->user_id = $user_id;
        if($order['name'] != '') $user->last_name = $order['name'];
        if($order['phone'] != '') $user->phone = $order['phone'];
        if($order['country'] != '') $user->billing_country = $order['country'];
        if($order['district'] != '') $user->billing_district = $order['district'];
        if($order['town'] != '') $user->billing_town = $order['town'];
        if($order['street_address'] != '') $user->billing_strt_address = $order['street_address'];
        if($order['apartment'] != '') $user->billing_apartment = $order['apartment'];
        if($order['post_code'] != '') $user->billing_post_code = $order['post_code'];
        if($order['post_machine'] != '') $user->post_machine = $order['post_machine'];

        if($order['company_name'] != '') $user->company_name = $order['company_name'];
        if($order['company_id'] != '') $user->company_id = $order['company_id'];
        if($order['company_vat'] != '') $user->company_vat = $order['company_vat'];
        if($order['company_address'] != '') $user->company_address = $order['company_address'];
        if($order['others'] != '') $user->others = $order['others'];

        $user->save();
    }

    public function p_test()
    {
        if (Auth::check()) {
            $data['check_basket'] = Cart::where('user_id', Auth::user()->id)->with('products', 'productPrice')->get();
            $user_id = Auth::user()->id;
        } else {
            $cart_items = (array) json_decode(Cookie::get('cart_items'));
            $data['check_basket'] = Product::WhereIn('id', array_keys($cart_items))->with('productPrice')->get();
        }

        //dd((array) json_decode(Cookie::get('cart_items')));
        //dd($data['check_basket']);
        $cart_remove = (array) json_decode(Cookie::get('cart_items'));

        foreach ($data['check_basket'] as $key => $product) {
            if (Auth::check()) {
                Cart::where('product_id', $product->id)->where('user_id', Auth::user()->id)->delete();
            } else {
                if (array_key_exists($product->id, $cart_remove)) {
                    unset($cart_remove[$product->id]);
                }
            }
        }
        Cookie::queue('cart_items', json_encode($cart_remove), 518400);

    }
    public function payseraCancel()
    {
        Session::forget('order_details');
        return redirect('/');
    }
    public function get_self_url()
    {
        $s = substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0,
            strpos($_SERVER['SERVER_PROTOCOL'], '/'));

        if (!empty($_SERVER["HTTPS"])) {
            $s .= ($_SERVER["HTTPS"] == "on") ? "s" : "";
        }

        $s .= '://' . $_SERVER['HTTP_HOST'];

        if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
            $s .= ':' . $_SERVER['SERVER_PORT'];
        }

        $s .= dirname($_SERVER['SCRIPT_NAME']);

        return $s;
    }

    public function payseraCallback( Request $request )
    {
        try {
            $params = [];
            if($request->data && $request->data != '') parse_str(base64_decode(strtr($request->data, ['-' => '+', '_' => '/'])), $params);
            if(array_key_exists('orderid',$params)){
                $order_id = @$params['orderid'];
                $get_order = Order::where('order_id', $order_id)->first();
                if ($get_order) {
                    $ord = Order::find($get_order->id);
                    $ord->is_paid = 1;
                    $ord->save();
                }
            }
            return 'OK';
        } catch (Exception $e) {
            //echo get_class($e) . ': ' . $e->getMessage();
            return 'OK';
        }
    }

}
