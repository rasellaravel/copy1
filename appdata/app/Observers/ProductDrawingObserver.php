<?php

namespace App\Observers;

use App\ProductDrawing;

class ProductDrawingObserver
{
    /**
     * Handle the product drawing "created" event.
     *
     * @param  \App\ProductDrawing  $productDrawing
     * @return void
     */
    public function created(ProductDrawing $productDrawing)
    {
        //
    }

    /**
     * Handle the product drawing "updated" event.
     *
     * @param  \App\ProductDrawing  $productDrawing
     * @return void
     */
    public function updated(ProductDrawing $productDrawing)
    {
        //
    }

    /**
     * Handle the product drawing "deleted" event.
     *
     * @param  \App\ProductDrawing  $productDrawing
     * @return void
     */
    public function deleted(ProductDrawing $productDrawing)
    {
        if ($productDrawing->img) {
            $path = 'uploads/product/drawing/' . $productDrawing->img;
            $r_path = 'uploads/product/drawing/r_' . $productDrawing->img;
            if (file_exists($path)) {
              unlink($path);
            }
            if (file_exists($r_path)) {
              unlink($r_path);
            }
        }
    }

    /**
     * Handle the product drawing "restored" event.
     *
     * @param  \App\ProductDrawing  $productDrawing
     * @return void
     */
    public function restored(ProductDrawing $productDrawing)
    {
        //
    }

    /**
     * Handle the product drawing "force deleted" event.
     *
     * @param  \App\ProductDrawing  $productDrawing
     * @return void
     */
    public function forceDeleted(ProductDrawing $productDrawing)
    {
        //
    }
}
