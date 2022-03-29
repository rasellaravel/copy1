<?php

namespace App\Http\Controllers\User;

use App\Helpers\PriceHelper;
use App\Http\Controllers\Controller;
use App\ProductPrice;
use App\ProductSize;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function products($model, $src = null)
    {
        $data = ProductService::get($model, 20, $src);
        $data['model'] = $model;
        return $data;
    }

    public function getPriceByFilter(Request $request)
    {
        $price = ProductPrice::where('pro_id', $request->id)->first();
        if ($request->sizes) {
            $product_size = ProductSize::where('product_id', $request->id)->whereJsonContains('size_id', $request->sizes)->first();
            $discount = 0;
            if ($product_size) {
                $price = PriceHelper::discountByPrice($price->discount, $product_size->price);
            } else {
                $price = 0;
            }
        } else {
            $price = PriceHelper::discountByPrice($price->discount, $price->price);
        }
        if (auth()->check()) {
            if (auth()->user()->userInfo->discount) {
                $data['user_discount'] = auth()->user()->userInfo->discount;
            } else {
                $data['user_discount'] = 0;
            }
        } else {
            $data['user_discount'] = 0;
        }
        $data['price'] = $price;
        return $data;
    }
}
