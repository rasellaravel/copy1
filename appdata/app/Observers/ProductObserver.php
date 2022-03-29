<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        if ($product->product_img) {
            $dimensions = ['xs' => 100, 'sm' => 300, 'md' => 600, 'lg' => 1000];
            foreach ($dimensions as $key => $value) {
                $path = 'uploads/product/alt/' . $key . '-' . $product->product_img;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        foreach ($product->productAltImages as $productImage) {
            $dimensions = ['sm' => 300, 'md' => 600, 'lg' => 1000];
            foreach ($dimensions as $key => $value) {
                $path = 'uploads/product/alt/' . $key . '-' . $productImage->img;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $product->productAltImages()->delete();
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
