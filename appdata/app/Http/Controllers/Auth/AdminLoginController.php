<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
	use AuthenticatesUsers;

	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');
	}
	public function showLoginForm()
	{
		return view('auth.admin-login');
	}
	public function login(Request $request)
	{
		// Attempt to log the admin in
		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)) {
			// if successful, then redirect to their intend location
			return redirect()->intended(route('admin.dashboard'));
		}

		// if unsuccessful, then redirect back to login page with form data
		return redirect()->back()->withInput($request->only('email', 'remember'))->with(['error' => 'Username or Password not match.']);
	}
	/**
	 * Log the user out of the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request)
	{
		$this->guard()->logout();

		return $this->loggedOut($request) ?: redirect()->route('home');
	}

	/**
	 * Get the guard to be used during authentication.
	 *
	 * @return \Illuminate\Contracts\Auth\StatefulGuard
	 */
	protected function guard()
	{
		return Auth::guard('admin');
	}
}
