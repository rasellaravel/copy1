<?php

namespace App\Http\Controllers\Admin;

use App\CustomColor;
use App\Http\Controllers\Controller;
use App\ProductPrice;
use App\YarnColor;
use Illuminate\Http\Request;

class CustomColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function customColor()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = CustomColor::orderBy('id', 'DESC')->get();
        // dd($menu);
        $data['m_n'] = 'color-list';
        $data['m_m_n'] = 'custom-colors';
        return view('back-end.custom_color.color-list', $data);
    }
    public function insertCustomColor(Request $request)
    {
        $customColor = new CustomColor;
        $customColor->color_en = $request->color_en;
        $customColor->color_lt = $request->color_lt ?: $request->color_en;
        $customColor->color_rus = $request->color_rus ?: $request->color_en;
        $customColor->color_pt = $request->color_pt ?: $request->color_en;
        $customColor->color_es = $request->color_es ?: $request->color_en;
        $customColor->code = $request->code;
        $customColor->save();

        $colors = CustomColor::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_color.color-view')->with(['data' => $colors])->render();
        return $html;
    }
    public function getCustomColor(Request $request)
    {
        return $colors = CustomColor::find($request->id);
    }
    public function updateCustomColor(Request $request)
    {
        $customColor = CustomColor::find($request->id);
        $customColor->color_en = $request->color_en;
        $customColor->color_lt = $request->color_lt ?: $request->color_en;
        $customColor->color_rus = $request->color_rus ?: $request->color_en;
        $customColor->color_pt = $request->color_pt ?: $request->color_en;
        $customColor->color_es = $request->color_es ?: $request->color_en;
        $customColor->code = $request->code;
        $customColor->save();

        $colors = CustomColor::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_color.color-view')->with(['data' => $colors])->render();

        return $html;
    }
    public function deleteCustomColor(Request $request)
    {
        $customColor = CustomColor::where('id', $request->id)->first();
        $product_prices = ProductPrice::whereJsonContains('custom_color_id', ["$customColor->id"])->exists();

        if ($product_prices) {
            return ["error" => "This color attached with multiple product. You can't delete this custom color."];
        }
        // $menu = Menu::whereJsonContains('surface_amber_id', ["$customColor->id"])->exists();
        // if ($menu) {
        //     return ["error" => "This surface amber attached with multiple menu and sub menu. You can't delete this surface amber."];
        // }
        $customColor->delete();
        $colors = CustomColor::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_color.color-view')->with(['data' => $colors])->render();

        return $html;
    }
    public function yarnColor()
    {
        $data['data'] = YarnColor::orderBy('id', 'DESC')->get();
        // dd($menu);
        $data['m_n'] = 'yarn-color-list';
        $data['m_m_n'] = 'custom-colors';
        return view('back-end.custom_color.yarn-color-list', $data);
    }
    public function insertYarnColor(Request $request)
    {
        $yarnColor = new YarnColor;
        $yarnColor->color_en = $request->color_en;
        $yarnColor->color_lt = $request->color_lt ?: $request->color_en;
        $yarnColor->color_rus = $request->color_rus ?: $request->color_en;
        $yarnColor->color_pt = $request->color_pt ?: $request->color_en;
        $yarnColor->color_es = $request->color_es ?: $request->color_en;
        $yarnColor->code = $request->code;
        $yarnColor->save();

        $colors = YarnColor::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_color.yarn-color-view')->with(['data' => $colors])->render();
        return $html;
    }
    public function getYarnColor(Request $request)
    {
        return $colors = YarnColor::find($request->id);
    }
    public function updateYarnColor(Request $request)
    {
        $yarnColor = YarnColor::find($request->id);
        $yarnColor->color_en = $request->color_en;
        $yarnColor->color_lt = $request->color_lt ?: $request->color_en;
        $yarnColor->color_rus = $request->color_rus ?: $request->color_en;
        $yarnColor->color_pt = $request->color_pt ?: $request->color_en;
        $yarnColor->color_es = $request->color_es ?: $request->color_en;
        $yarnColor->code = $request->code;
        $yarnColor->save();

        $colors = YarnColor::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_color.yarn-color-view')->with(['data' => $colors])->render();

        return $html;
    }
    public function deleteYarnColor(Request $request)
    {
        $yarnColor = YarnColor::where('id', $request->id)->first();
        $product_prices = ProductPrice::whereJsonContains('yarn_color_id', ["$yarnColor->id"])->exists();

        if ($product_prices) {
            return ["error" => "This color attached with multiple product. You can't delete this yarn color."];
        }
        // $menu = Menu::whereJsonContains('surface_amber_id', ["$customColor->id"])->exists();
        // if ($menu) {
        //     return ["error" => "This surface amber attached with multiple menu and sub menu. You can't delete this surface amber."];
        // }
        $yarnColor->delete();
        $colors = YarnColor::orderBy('id', 'DESC')->get();

        $html = view('back-end.custom_color.yarn-color-view')->with(['data' => $colors])->render();

        return $html;
    }
}
