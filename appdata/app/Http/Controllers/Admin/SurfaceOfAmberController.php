<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use App\ProductPrice;
use App\SurfaceAmber;
use Illuminate\Http\Request;

class SurfaceOfAmberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function surfaceOfAmber()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = SurfaceAmber::orderBy('id', 'DESC')->get();
        // dd($menu);
        $data['m_n'] = 'surface-amber-list';
        $data['m_m_n'] = 'surface-amber';
        return view('back-end.surface_amber.surface-amber-list', $data);
    }
    public function insertSurfaceOfAmber(Request $request)
    {
        $surfaceAmber = new SurfaceAmber;
        $surfaceAmber->name_en = $request->name_en;
        $surfaceAmber->name_lt = $request->name_lt ?: $request->name_en;
        $surfaceAmber->name_rus = $request->name_rus ?: $request->name_en;
        $surfaceAmber->name_pt = $request->name_pt ?: $request->name_en;
        $surfaceAmber->name_es = $request->name_es ?: $request->name_en;
        $surfaceAmber->save();

        $surface_ambers = SurfaceAmber::orderBy('id', 'DESC')->get();

        $html = view('back-end.surface_amber.surface-amber-view')->with(['data' => $surface_ambers])->render();

        return $html;
    }
    public function getSurfaceOfAmber(Request $request)
    {
        return $surface_amber = SurfaceAmber::find($request->id);
    }
    public function updateSurfaceOfAmber(Request $request)
    {
        $surfaceAmber = SurfaceAmber::find($request->id);
        $surfaceAmber->name_en = $request->name_en;
        $surfaceAmber->name_lt = $request->name_lt ?: $request->name_en;
        $surfaceAmber->name_rus = $request->name_rus ?: $request->name_en;
        $surfaceAmber->name_pt = $request->name_pt ?: $request->name_en;
        $surfaceAmber->name_es = $request->name_es ?: $request->name_en;
        $surfaceAmber->save();

        $surface_ambers = SurfaceAmber::orderBy('id', 'DESC')->get();

        $html = view('back-end.surface_amber.surface-amber-view')->with(['data' => $surface_ambers])->render();

        return $html;
    }
    public function deleteSurfaceOfAmber(Request $request)
    {
        $surfaceAmber = SurfaceAmber::find($request->id);
        $product_prices = ProductPrice::whereJsonContains('surface_amber_id', ["$surfaceAmber->id"])->exists();

        if ($product_prices) {
            return ["error" => "This surface amber attached with multiple product. You can't delete this surface amber."];
        }
        $menu = Menu::whereJsonContains('surface_amber_id', ["$surfaceAmber->id"])->exists();
        if ($menu) {
            return ["error" => "This surface amber attached with multiple menu and sub menu. You can't delete this surface amber."];
        }
        $surfaceAmber->delete();

        $surface_ambers = SurfaceAmber::orderBy('id', 'DESC')->get();

        $html = view('back-end.surface_amber.surface-amber-view')->with(['data' => $surface_ambers])->render();

        return $html;
    }
}
