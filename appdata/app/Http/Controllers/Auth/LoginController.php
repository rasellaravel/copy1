<?php

namespace App\Http\Controllers\Auth;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Services\GetCartService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }
    public function showLoginForm()
    {
        return view('front-end.user-login');
    }
    public function login(Request $request)
    {
        $prev = url()->previous();
        $ex = explode('/', $prev);
        $validator = Validator::make(request()->all(), [
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $validator->errors()->add('tab', 1);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $remember = false;
        if ($request->remember) {
            $remember = true;
        }

        $carts = GetCartService::cartData();
        // Attempt to log the admin in
        if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intend location
            if ($ex[3] == 'checkout') {
                foreach ($carts as $cart) {
                    $quantity = @$cart->quantity;
                    $product_id = @$cart->product_id;
                    $size = @$cart->size;
                    $price = @$cart->price;
                    $color = @$cart->color;
                    $check_carts = Cart::where('product_id', $product_id)
                        ->where('user_id', auth()->user()->id)
                        ->when($color, function ($q) use ($color) {
                            return $q->where('color', $color);
                        })
                        ->when($size, function ($q) use ($size) {
                            return $q->where('size', json_encode($size));
                        })
                        ->exists();
                    if (!$check_carts) {
                        $new_cart = new Cart;
                        $new_cart->user_id = auth()->user()->id;
                        $new_cart->product_id = $product_id;
                        $new_cart->quantity = $quantity;
                        $new_cart->price = $price;
                        $new_cart->size = $size;
                        $new_cart->color = $color;
                        $new_cart->save();
                    }
                }
                Cookie::queue('cart_items', '', -518400);

                return redirect()->back();
            } else {
                return redirect()->intended(route('profile'));
            }
        }
        // if unsuccessful, then redirect back to login page with form data
        return redirect()->back()->with(['error' => 'Username or Password not match.'])->withErrors(['tab' => 1]);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        return $this->loggedOut($request) ?: redirect()->route('home');
    }
    protected function guard()
    {
        return auth()->guard('web');
    }
}
