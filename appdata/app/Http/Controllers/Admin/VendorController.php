<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function vendors()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }
        $data['data'] = Admin::orderBy('id', 'DESC')->whereNotIn('role', [1])->get();
        // dd($menu);
        $data['m_n'] = 'vendor-list';
        $data['m_m_n'] = 'vendors';
        return view('back-end.vendor.vendor-list', $data);
    }
    public function insertVendor(Request $request)
    {
        if (Admin::where('email', $request->email)->exists()) {
            return ['error' => 'The email already exist.'];
        }
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = 2;
        $admin->save();

        $vendors = Admin::orderBy('id', 'DESC')->whereNotIn('role', [1])->get();

        $html = view('back-end.vendor.vendor-view')->with(['data' => $vendors])->render();

        return $html;
    }
    public function getVendor(Request $request)
    {
        return Admin::find($request->id);
    }
    public function updateVendor(Request $request)
    {
        // $admin = Admin::find($request->id);
        // $admin->name = $request->name;
        // $admin->email = $request->email;
        // if ($request->password) {
        //     $admin->password = Hash::make($request->password);
        // }
        // $admin->save();

        // $vendors = Admin::orderBy('id', 'DESC')->whereNotIn('role', [1])->get();

        // $html = view('back-end.vendor.vendor-view')->with(['data' => $vendors])->render();
        // return $html;
    }
    public function deleteVendor(Request $request)
    {
        Admin::find($request->id)->delete();

        $vendors = Admin::orderBy('id', 'DESC')->whereNotIn('role', [1])->get();

        $html = view('back-end.vendor.vendor-view')->with(['data' => $vendors])->render();
        return $html;
    }
    public function loginAsVendor($id)
    {
        auth()->loginUsingId($id);
        return redirect()->back();
    }
    public function loginBackSuperAdmin()
    {
        $superAdmin = Admin::where('role', 1)->first();
        auth()->loginUsingId($superAdmin->id);
        return redirect()->back();
    }
}
