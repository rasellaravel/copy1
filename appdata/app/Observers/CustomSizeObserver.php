<?php

namespace App\Observers;

use App\CustomSize;

class CustomSizeObserver
{
    /**
     * Handle the custom size "created" event.
     *
     * @param  \App\CustomSize  $customSize
     * @return void
     */
    public function created(CustomSize $customSize)
    {
        //
    }

    /**
     * Handle the custom size "updated" event.
     *
     * @param  \App\CustomSize  $customSize
     * @return void
     */
    public function updated(CustomSize $customSize)
    {
        //
    }

    /**
     * Handle the custom size "deleted" event.
     *
     * @param  \App\CustomSize  $customSize
     * @return void
     */
    public function deleted(CustomSize $customSize)
    {
        foreach($customSize->sizes as $size) {
            $path = 'uploads/filters/' . $size->img;
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    /**
     * Handle the custom size "restored" event.
     *
     * @param  \App\CustomSize  $customSize
     * @return void
     */
    public function restored(CustomSize $customSize)
    {
        //
    }

    /**
     * Handle the custom size "force deleted" event.
     *
     * @param  \App\CustomSize  $customSize
     * @return void
     */
    public function forceDeleted(CustomSize $customSize)
    {
        //
    }
}
