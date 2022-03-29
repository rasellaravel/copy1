<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Country;
use App\Http\Controllers\Controller;
use App\Shipping;
use App\ShippingCategory;
use App\ShippingSetting;
use App\ShippingType;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function country()
    {
        $data['data'] = Country::all();
        // dd($menu);
        $data['m_n'] = 'country-list';
        $data['m_m_n'] = 'shipping';
        return view('back-end.shipping.country-list', $data);
    }
    public function getCountry(Request $request)
    {
        return $country = Country::find($request->id);
    }
    public function updateCountry(Request $request)
    {
        $country = Country::find($request->id);
        $country->name = $request->name;
        $country->code = $request->code;
        if ($request->status) {
            $country->status = 1;
        } else {
            $country->status = 0;
        }
        $country->save();

        $countries = Country::all();

        $html = view('back-end.shipping.country-view')->with(['data' => $countries])->render();

        return $html;
    }
    public function deleteCountry(Request $request)
    {
        $country = Country::where('id', $request->id)->first();
        $shipping = Shipping::where('country_id', $country->id)->exists();

        if ($shipping) {
            return ["error" => "This country attached with multiple shipping. You can't delete this country."];
        }
        // $menu = Menu::whereJsonContains('surface_amber_id', ["$country->id"])->exists();
        // if ($menu) {
        //     return ["error" => "This surface amber attached with multiple menu and sub menu. You can't delete this surface amber."];
        // }
        $country->delete();
        $countries = Country::all();

        $html = view('back-end.shipping.country-view')->with(['data' => $countries])->render();

        return $html;
    }
    public function shippingType()
    {
        $data['data'] = ShippingType::orderBy('id', 'DESC')->get();
        // dd($menu);
        $data['m_n'] = 'shipping-type-list';
        $data['m_m_n'] = 'shipping';
        return view('back-end.shipping.shipping-type-list', $data);
    }
    public function insertShippingType(Request $request)
    {
        $shippingType = new ShippingType;
        $shippingType->type = $request->type;
        $shippingType->save();

        $types = ShippingType::orderBy('id', 'DESC')->get();

        $html = view('back-end.shipping.shipping-type-view')->with(['data' => $types])->render();
        return $html;
    }
    public function getShippingType(Request $request)
    {
        return $types = ShippingType::find($request->id);
    }
    public function updateShippingType(Request $request)
    {
        $shippingType = ShippingType::find($request->id);
        $shippingType->type = $request->type;
        $shippingType->status = $request->status ? 1 : 0;
        $shippingType->save();

        $types = ShippingType::orderBy('id', 'DESC')->get();

        $html = view('back-end.shipping.shipping-type-view')->with(['data' => $types])->render();

        return $html;
    }
    public function deleteShippingType(Request $request)
    {
        $shippingType = ShippingType::where('id', $request->id)->first();
        $shipping = Shipping::where('shipping_type_id', $shippingType->id)->exists();
        if ($shipping) {
            return ["error" => "This shipping type attached with multiple shipping. You can't delete this shipping type."];
        }

        $shippingType->delete();
        $types = ShippingType::orderBy('id', 'DESC')->get();

        $html = view('back-end.shipping.shipping-type-view')->with(['data' => $types])->render();

        return $html;
    }
    public function shippingCategory()
    {
        $data['data'] = ShippingCategory::orderBy('id', 'DESC')->get();
        // dd($menu);
        $data['m_n'] = 'shipping-category-list';
        $data['m_m_n'] = 'shipping';
        return view('back-end.shipping.shipping-category-list', $data);
    }
    public function insertShippingCategory(Request $request)
    {
        $shippingCategory = new ShippingCategory;
        $shippingCategory->name = $request->name;
        $shippingCategory->save();

        $categories = ShippingCategory::orderBy('id', 'DESC')->get();

        $html = view('back-end.shipping.shipping-category-view')->with(['data' => $categories])->render();
        return $html;
    }
    public function getShippingCategory(Request $request)
    {
        return $categories = ShippingCategory::find($request->id);
    }
    public function updateShippingCategory(Request $request)
    {
        $shippingCategory = ShippingCategory::find($request->id);
        $shippingCategory->name = $request->name;
        $shippingCategory->status = $request->status ? 1 : 0;
        $shippingCategory->save();

        $categories = ShippingCategory::orderBy('id', 'DESC')->get();

        $html = view('back-end.shipping.shipping-category-view')->with(['data' => $categories])->render();

        return $html;
    }
    public function deleteShippingCategory(Request $request)
    {
        $shippingCategory = ShippingCategory::where('id', $request->id)->first();
        $shipping = Shipping::where('shipping_category_id', $shippingCategory->id)->exists();
        if ($shipping) {
            return ["error" => "This shipping category attached with multiple shipping. You can't delete this shipping category."];
        }

        $shippingCategory->delete();
        $categories = ShippingCategory::orderBy('id', 'DESC')->get();

        $html = view('back-end.shipping.shipping-category-view')->with(['data' => $categories])->render();

        return $html;
    }
    public function shipping()
    {
        $checkRole = Admin::find(auth()->user()->id);

        $data['data'] = Shipping::orderBy('id', 'DESC')
            ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                return $q->where('vendor_id', $checkRole->id);
            })
            ->with('country', 'shippingType', 'shippingCategory')
            ->get();
        $data['countries'] = Country::all();
        $data['types'] = ShippingType::all();
        $data['categories'] = ShippingCategory::all();
        // dd($menu);
        $data['m_n'] = 'shipping-list';
        $data['m_m_n'] = 'shipping';
        return view('back-end.shipping.shipping-list', $data);
    }
    public function insertShipping(Request $request)
    {
        $data['error'] = "";
        foreach ($request->vendor_id as $vendor) {
            foreach ($request->country_id as $country) {
                if (!Shipping::where('country_id', $country)
                    ->where('shipping_type_id', $request->type_id)
                    ->where('shipping_category_id', $request->category_id)
                    ->where('vendor_id', $vendor)
                    ->exists()) {
                    $shipping = new Shipping;
                    $shipping->country_id = $country;
                    $shipping->vendor_id = $vendor;
                    $shipping->shipping_type_id = $request->type_id;
                    $shipping->shipping_category_id = $request->category_id;
                    $shipping->processing_time = $request->processing_time;
                    $shipping->delivery_from = $request->delivery_from;
                    $shipping->delivery_to = $request->delivery_to;
                    $shipping->max_weight = $request->max_weight;
                    $shipping->additional_weight_price = $request->additional_weight_price;
                    $shipping->price = $request->price;
                    $shipping->additional_price = $request->additional_price;
                    $shipping->max_price = $request->max_price;
                    $shipping->save();
                } else {
                    $data['error'] = " But some Shipping already exist. Not possible to insert those.";
                }
            }
        }

        $checkRole = Admin::find(auth()->user()->id);

        $shippings = Shipping::orderBy('id', 'DESC')
            ->with('country', 'shippingType', 'shippingCategory')
            ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                return $q->where('vendor_id', $checkRole->id);
            })
            ->get();

        $data['html'] = view('back-end.shipping.shipping-view')->with(['data' => $shippings])->render();
        return $data;
    }
    public function getShipping(Request $request)
    {
        return $shippings = Shipping::find($request->id);
    }
    public function updateShipping(Request $request)
    {
        $shipping = Shipping::find($request->id);
        if (!Shipping::where('country_id', $request
            ->country_id)
            ->where('shipping_type_id', $request->type_id)
            ->where('shipping_category_id', $request->category_id)
            ->where('vendor_id', $request->vendor_id)
            ->whereNotIn('id', [$shipping->id])
            ->exists()) {
            $shipping->country_id = $request->country_id;
            $shipping->vendor_id = $request->vendor_id;
            $shipping->shipping_type_id = $request->type_id;
            $shipping->shipping_category_id = $request->category_id;
            $shipping->processing_time = $request->processing_time;
            $shipping->delivery_from = $request->delivery_from;
            $shipping->delivery_to = $request->delivery_to;
            $shipping->max_weight = $request->max_weight;
            $shipping->additional_weight_price = $request->additional_weight_price;
            $shipping->price = $request->price;
            $shipping->additional_price = $request->additional_price;
            $shipping->max_price = $request->max_price;

            $shipping->save();

            $checkRole = Admin::find(auth()->user()->id);

            $shippings = Shipping::orderBy('id', 'DESC')
                ->with('country', 'shippingType', 'shippingCategory')
                ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                    return $q->where('vendor_id', $checkRole->id);
                })
                ->get();

            $html = view('back-end.shipping.shipping-view')->with(['data' => $shippings])->render();

            return $html;
        } else {
            return ["error" => "Update not possible. Same shipping already exist!"];
        }

    }
    public function deleteShipping(Request $request)
    {
        $shipping = Shipping::where('id', $request->id)->first();
        // $product_prices = ProductPrice::whereJsonContains('custom_color_id', ["$shippingType->id"])->exists();

        // if ($product_prices) {
        //     return ["error" => "This color attached with multiple product. You can't delete this custom color."];
        // }
        // $menu = Menu::whereJsonContains('surface_amber_id', ["$shippingType->id"])->exists();
        // if ($menu) {
        //     return ["error" => "This surface amber attached with multiple menu and sub menu. You can't delete this surface amber."];
        // }
        $shipping->delete();

        $checkRole = Admin::find(auth()->user()->id);

        $shippings = Shipping::orderBy('id', 'DESC')
            ->with('country', 'shippingType', 'shippingCategory')
            ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                return $q->where('vendor_id', $checkRole->id);
            })
            ->get();

        $html = view('back-end.shipping.shipping-view')->with(['data' => $shippings])->render();

        return $html;
    }

    public function shippingSetting()
    {
        $data['data'] = ShippingSetting::orderBy('id', 'DESC')->first();
        // dd($menu);
        $data['m_n'] = 'shipping-setting-list';
        $data['m_m_n'] = 'shipping';
        return view('back-end.shipping.setting-list', $data);
    }
    public function insertShippingSetting(Request $request)
    {
        $check = ShippingSetting::orderBy('id', 'DESC')->first();
        if ($check) {
            $shippingSetting = ShippingSetting::find($check->id);
        } else {
            $shippingSetting = new ShippingSetting;
        }
        $shippingSetting->min_price = $request->min_price;
        $shippingSetting->min_item = $request->min_item;
        $shippingSetting->save();
    }
}
