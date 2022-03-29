<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function index()
	{
		$data['m_m_n'] = 'dashboard';
		return view('back-end.dashboard.index', $data);
	}

  	public function changePassword(Request $request)
	{
		return view('back-end.change-password.index');
	}

	public function passwordChange( Request $request )
	{
		$user = Auth::user();
		$user->name = $request->name;
		$user->email = $request->email;
		if($request->password) $user->password = Hash::make($request->password);
		$user->save();
		return redirect()->back()->with('success','Admin successfully updated!');
	}
}
