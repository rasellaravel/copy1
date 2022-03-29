<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasp;
use App\Http\Controllers\Controller;
use App\Menu;
use App\ProductPrice;
use Illuminate\Http\Request;

class CustomClaspController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function customClasp()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = CustomClasp::orderBy('id', 'DESC')->get();
        // dd($menu);
        $data['m_n'] = 'clasp-list';
        $data['m_m_n'] = 'custom-clasp';
        return view('back-end.custom_clasp.clasp-list', $data);
    }
    public function insertCustomClasp(Request $request)
    {
        $customClasp = new CustomClasp;
        $customClasp->name_en = $request->name_en;
        $customClasp->name_lt = $request->name_lt ?: $request->name_en;
        $customClasp->name_rus = $request->name_rus ?: $request->name_en;
        $customClasp->name_pt = $request->name_pt ?: $request->name_en;
        $customClasp->name_es = $request->name_es ?: $request->name_en;
        $customClasp->save();

        $clasps = CustomClasp::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_clasp.clasp-view')->with(['data' => $clasps])->render();

        return $html;
    }
    public function getCustomClasp(Request $request)
    {
        return $clasp = CustomClasp::find($request->id);
    }
    public function updateCustomClasp(Request $request)
    {
        $customClasp = CustomClasp::find($request->id);
        $customClasp->name_en = $request->name_en;
        $customClasp->name_lt = $request->name_lt ?: $request->name_en;
        $customClasp->name_rus = $request->name_rus ?: $request->name_en;
        $customClasp->name_pt = $request->name_pt ?: $request->name_en;
        $customClasp->name_es = $request->name_es ?: $request->name_en;
        $customClasp->save();

        $clasps = CustomClasp::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_clasp.clasp-view')->with(['data' => $clasps])->render();

        return $html;
    }
    public function deleteCustomClasp(Request $request)
    {
        $customClasp = CustomClasp::find($request->id);
        $product_prices = ProductPrice::whereJsonContains('custom_clasp_id', ["$customClasp->id"])->exists();

        if ($product_prices) {
            return ["error" => "This clasp attached with multiple product. You can't delete this custom clasp."];
        }
        $menu = Menu::whereJsonContains('surface_amber_id', ["$customClasp->id"])->exists();
        if ($menu) {
            return ["error" => "This surface amber attached with multiple menu and sub menu. You can't delete this surface amber."];
        }
        $customClasp->delete();

        $clasps = CustomClasp::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_clasp.clasp-view')->with(['data' => $clasps])->render();

        return $html;
    }
}
