<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function settings()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = Setting::orderBy('id', 'DESC')->first();
        $data['m_m_n'] = 'settings';
        return view('back-end.setting.setting-list', $data);
    }
    public function insertSetting(Request $request)
    {
        $check = Setting::orderBy('id', 'DESC')->first();
        if ($check) {
            $setting = Setting::find($check->id);
        } else {
            $setting = new Setting;
        }
        $setting->min_price = $request->min_price;
        $setting->maintenance_charge = $request->maintenance_charge;
        $setting->save();
    }
}
