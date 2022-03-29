<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $products = Product::with(
            'menu',
            'subMenu',
            'innerMenu',
            'vendor',
            'shippingCategory',
            'productAltImages',
            'productSizes',
            'slug',
            'productPrice.customClasps',
            'productPrice.customColors', 
            'productPrice.yarnColors', 
            'productPrice.surfaceAmbers', 
            'productSpecifications.specification'
        )
        ->get();
        dd($products->toArray());
        return view('backexports.products', [
            'products' => $products
        ]);
    }
}
