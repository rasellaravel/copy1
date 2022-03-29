<?php

namespace App\Observers;

use App\Size;

class SizeObserver
{
    /**
     * Handle the size "created" event.
     *
     * @param  \App\Size  $size
     * @return void
     */
    public function created(Size $size)
    {
        //
    }

    /**
     * Handle the size "updated" event.
     *
     * @param  \App\Size  $size
     * @return void
     */
    public function updated(Size $size)
    {
        if(request()->img != "undefined"){
            $img = $size->getOriginal('img');
            $path = 'uploads/filters/' . $img;
            if (file_exists($path)) {
              unlink($path);
            }
        }
    }

    /**
     * Handle the size "deleted" event.
     *
     * @param  \App\Size  $size
     * @return void
     */
    public function deleted(Size $size)
    {
        $path = 'uploads/filters/' . $size->img;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    /**
     * Handle the size "restored" event.
     *
     * @param  \App\Size  $size
     * @return void
     */
    public function restored(Size $size)
    {
        //
    }

    /**
     * Handle the size "force deleted" event.
     *
     * @param  \App\Size  $size
     * @return void
     */
    public function forceDeleted(Size $size)
    {
        //
    }
}
