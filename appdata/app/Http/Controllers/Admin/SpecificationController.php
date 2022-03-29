<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductSpecification;
use App\Specification;
use Illuminate\Http\Request;
use App\Menu;

class SpecificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function specification()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = Specification::orderBy('id', 'DESC')->get();
        // dd($menu);
        $data['m_n'] = 'specification-list';
        $data['m_m_n'] = 'specification';
        return view('back-end.specification.specification-list', $data);
    }
    public function insertSpecification(Request $request)
    {
        $specification = new Specification;
        $specification->name_en = $request->name_en;
        $specification->name_lt = $request->name_lt ?: $request->name_en;
        $specification->name_rus = $request->name_rus ?: $request->name_en;
        $specification->name_pt = $request->name_pt ?: $request->name_en;
        $specification->name_es = $request->name_es ?: $request->name_en;
        $specification->save();

        $specifications = Specification::orderBy('id', 'DESC')->get();

        $html = view('back-end.specification.specification-view')->with(['data' => $specifications])->render();
        return $html;
    }
    public function getSpecification(Request $request)
    {
        return $specifications = Specification::find($request->id);
    }
    public function updateSpecification(Request $request)
    {
        $specification = Specification::find($request->id);
        $specification->name_en = $request->name_en;
        $specification->name_lt = $request->name_lt ?: $request->name_en;
        $specification->name_rus = $request->name_rus ?: $request->name_en;
        $specification->name_pt = $request->name_pt ?: $request->name_en;
        $specification->name_es = $request->name_es ?: $request->name_en;
        $specification->save();

        $specifications = Specification::orderBy('id', 'DESC')->get();

        $html = view('back-end.specification.specification-view')->with(['data' => $specifications])->render();

        return $html;
    }
    public function deleteSpecification(Request $request)
    {
        $specification = Specification::where('id', $request->id)->first();
        $product_specifications = ProductSpecification::where('specification_id', $specification->id)->exists();

        if ($product_specifications) {
            return ["error" => "This specification attached with multiple product. You can't delete this specification."];
        }
        $menu = Menu::whereJsonContains('specification_id', ["$specification->id"])->exists();
        if ($menu) {
            return ["error" => "This specification attached with multiple menu, sub menu and inner menu. You can't delete this specification."];
        }
        $specification->delete();
        $specifications = Specification::orderBy('id', 'DESC')->get();

        $html = view('back-end.specification.specification-view')->with(['data' => $specifications])->render();

        return $html;
    }
}
