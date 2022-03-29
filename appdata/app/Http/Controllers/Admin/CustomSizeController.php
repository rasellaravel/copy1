<?php

namespace App\Http\Controllers\Admin;

use App\CustomColor;
use App\CustomSize;
use App\Http\Controllers\Controller;
use App\InnerMenu;
use App\Menu;
use App\ProductSize;
use App\Size;
use App\SubMenu;
use Illuminate\Http\Request;

class CustomSizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function customSize()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = CustomSize::orderBy('id', 'DESC')->with('sizes')->get();
        // dd($menu);
        $data['m_n'] = 'size-list';
        $data['m_m_n'] = 'custom-sizes';
        return view('back-end.custom_size.size-list', $data);
    }
    public function insertCustomSize(Request $request)
    {
        $customSize = new CustomSize;
        $customSize->name_en = $request->size_name_en;
        $customSize->name_lt = $request->size_name_lt ?: $request->size_name_en;
        $customSize->name_rus = $request->size_name_rus ?: $request->size_name_en;
        $customSize->name_pt = $request->size_name_pt ?: $request->size_name_en;
        $customSize->name_es = $request->size_name_es ?: $request->size_name_en;
        $customSize->save();
        $size = [];
        $filterSize_en = array_filter($request->size_en);
        $filterSize_lt = array_filter($request->size_lt);
        $filterSize_rus = array_filter($request->size_rus);
        $filterSize_pt = array_filter($request->size_pt ?? $request->size_en);
        $filterSize_es = array_filter($request->size_es ?? $request->size_en);
        for ($i = 0; $i < count($filterSize_en); $i++) {
            // $size[] = new Size([
            //     'custom_size_id' => $customSize->getKey(),
            //     'size_en' => $filterSize_en[$i],
            //     'size_lt' => @$filterSize_lt[$i] ?: $filterSize_en[$i],
            //     'size_rus' => @$filterSize_rus[$i] ?: $filterSize_en[$i],
            //     'size_pt' => @$filterSize_pt[$i] ?: $filterSize_en[$i],
            //     'size_es' => @$filterSize_es[$i] ?: $filterSize_en[$i],
            // ]);

            Size::create([
                'custom_size_id' => $customSize->getKey(),
                'size_en' => $filterSize_en[$i],
                'size_lt' => @$filterSize_lt[$i] ?: $filterSize_en[$i],
                'size_rus' => @$filterSize_rus[$i] ?: $filterSize_en[$i],
                'size_pt' => @$filterSize_pt[$i] ?: $filterSize_en[$i],
                'size_es' => @$filterSize_es[$i] ?: $filterSize_en[$i],
            ]);
        }

        
        //$customSize->sizes()->saveMany($size);

        $sizes = CustomSize::orderBy('id', 'DESC')->with('sizes')->get();

        $html = view('back-end.custom_size.size-view')->with(['data' => $sizes])->render();

        return $html;
    }
    public function getCustomSize(Request $request)
    {
        $sizes = CustomSize::find($request->id);
        $data = [];
        $html = '';
        foreach ($sizes->sizes as $size) {
            $html .= '<div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-danger" type="button" onclick="deleteSizeItem(event, ' . $size->id . ')">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
            <input type="text" class="form-control size-old-en" value="' . $size->size_en . '" placeholder="Size En">
            <input type="text" class="form-control size-old-lt" value="' . $size->size_lt . '" placeholder="Size Lt">
            <input type="text" class="form-control size-old-rus" value="' . $size->size_rus . '" placeholder="Size Rus">
            <div class="input-group-append">
                <button class="btn btn-success" type="button" onclick="updateSizeItem(event, ' . $size->id . ')">
                    <i class="fa fa-save"></i>
                </button>
            </div>
        </div>';
        }
        $data['html'] = $html;
        $data['data'] = $sizes;
        return $data;
    }
    public function updateSizeItem(Request $request)
    {
        $size = Size::find($request->id);
        $size->size_en = $request->size_en;
        $size->size_lt = $request->size_lt ?: $request->size_en;
        $size->size_rus = $request->size_rus ?: $request->size_en;
        $size->size_pt = $request->size_pt ?: $request->size_en;
        $size->size_es = $request->size_es ?: $request->size_en;
        $size->save();

        $sizes = Size::where('custom_size_id', $size->custom_size_id)->get();
        $s_size_en = [];
        $s_size_lt = [];
        $s_size_rus = [];
        $s_size_pt = [];
        $s_size_es = [];
        foreach ($sizes as $val) {
            $s_size_en[] = $val->size_en;
            $s_size_lt[] = $val->size_lt;
            $s_size_rus[] = $val->size_rus;
            $s_size_pt[] = $val->size_pt;
            $s_size_es[] = $val->size_es;
        }
        $html = "EN - " . implode(', ', $s_size_en) . "<br />" .
        "LT - " . implode(', ', $s_size_lt) . "<br />" .
        "RUS - " . implode(', ', $s_size_rus) . "<br />" .
        "PT - " . implode(', ', $s_size_pt) . "<br />" .
        "ES - " . implode(', ', $s_size_es);
        return $html;
    }
    public function deleteSizeItem(Request $request)
    {
        $size = Size::find($request->id);
        $size->delete();

        $sizes = Size::where('custom_size_id', $size->custom_size_id)->get();
        $s_size_en = [];
        $s_size_lt = [];
        $s_size_rus = [];
        $s_size_pt = [];
        $s_size_es = [];
        foreach ($sizes as $val) {
            $s_size_en[] = $val->size_en;
            $s_size_lt[] = $val->size_lt;
            $s_size_rus[] = $val->size_rus;
            $s_size_pt[] = $val->size_pt;
            $s_size_es[] = $val->size_es;
        }
        $html = "EN - " . implode(', ', $s_size_en) . "<br />" .
        "LT - " . implode(', ', $s_size_lt) . "<br />" .
        "RUS - " . implode(', ', $s_size_rus) . "<br />" .
        "PT - " . implode(', ', $s_size_pt) . "<br />" .
        "ES - " . implode(', ', $s_size_es);
        return $html;
    }
    public function updateCustomSize(Request $request)
    {
        $customSize = CustomSize::find($request->id);
        $customSize->name_en = $request->size_name_en;
        $customSize->name_lt = $request->size_name_lt ?: $request->size_name_en;
        $customSize->name_rus = $request->size_name_rus ?: $request->size_name_en;
        $customSize->name_pt = $request->size_name_pt ?: $request->size_name_en;
        $customSize->name_es = $request->size_name_es ?: $request->size_name_en;
        $customSize->save();
        $size = [];
        $filterSize_en = array_filter($request->size_en);
        $filterSize_lt = array_filter($request->size_lt);
        $filterSize_rus = array_filter($request->size_rus);
        $filterSize_pt = array_filter($request->size_pt ?? $request->size_en);
        $filterSize_es = array_filter($request->size_es ?? $request->size_en);
        for ($i = 0; $i < count($filterSize_en); $i++) {
            $size[] = new Size([
                'custom_size_id' => $customSize->getKey(),
                'size_en' => $filterSize_en[$i],
                'size_lt' => @$filterSize_lt[$i] ?: $filterSize_en[$i],
                'size_rus' => @$filterSize_rus[$i] ?: $filterSize_en[$i],
                'size_pt' => @$filterSize_pt[$i] ?: $filterSize_en[$i],
                'size_es' => @$filterSize_es[$i] ?: $filterSize_en[$i],
            ]);
        }
        $customSize->sizes()->saveMany($size);

        $sizes = CustomSize::orderBy('id', 'DESC')->with('sizes')->get();

        $html = view('back-end.custom_size.size-view')->with(['data' => $sizes])->render();

        return $html;
    }
    public function deleteCustomSize(Request $request)
    {
        $customSize = CustomSize::where('id', $request->id)->with('sizes')->first();
        $sizes = $customSize->sizes->pluck('id');
        $product_sizes = ProductSize::when(count($sizes), function ($q) use ($sizes) {
            foreach ($sizes as $key => $size) {
                if (!$key) {
                    $q->whereJsonContains('size_id', ["$size"]);
                    continue;
                }
                $q->orWhereJsonContains('size_id', ["$size"]);
            }
        })
            ->exists();

        if ($product_sizes) {
            return ["error" => "This sizes attached with multiple product. You can't delete this custom size."];
        }
        $customSize->delete();

        $sizes = CustomSize::orderBy('id', 'DESC')->with('sizes')->get();

        $html = view('back-end.custom_size.size-view')->with(['data' => $sizes])->render();

        return $html;
    }
    public function getColorSizeAppendContent()
    {
        $colors = CustomColor::orderBy('id', 'DESC')->get();
        $id_c = request()->id_c;
        if ($id_c == 'inner_menu_id_en' || $id_c == 'innerMenuIdEn') {
            $menu = InnerMenu::where('id', request()->id)->with('customSizes.sizes')->first();
        } elseif ($id_c == 'sub_menu_id_en' || $id_c == 'subMenuIdEn') {
            $menu = SubMenu::where('id', request()->id)->with('customSizes.sizes')->first();
        } else {
            $menu = Menu::where('id', request()->id)->with('customSizes.sizes')->first();
        }

        $html = '<div class="input-group mb-3">
    		<div class="input-group-prepend">
				<button class="btn btn-info" type="button" onclick="removeItem(event)">
					<i class="fa fa-minus"></i>
				</button>
			</div>';
        $unique_id = uniqid();
        $cp = request()->cp;
        foreach ($menu->customSizes as $customSize) {
            $html .= '<select id="color_en" name="product_size[' . $unique_id . '][size][]" class="custom-select">
				<option value="0">Select an Option</option>';
            foreach ($customSize->sizes as $size) {
                $html .= '<option value="' . $size->id . '">' . $size->size_en . '</option>';
            }
            $html .= '</select>';
        }
        $html .= '<input type="text" name="product_size[' . $unique_id . '][price]" value="' . number_format((float) request()->price, 2, '.', '') . '" class="' . $cp . ' form-control" style="width: 100px;">
			<div class="input-group-append">
				<button class="btn btn-info" type="button" onclick="appendItemP(event, \'' . $id_c . '\', \'' . $cp . '\')">
					<i class="fa fa-plus"></i>
				</button>
			</div>
		</div>';
        return $html;
    }
}
