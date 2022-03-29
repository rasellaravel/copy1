<?php

namespace App\Observers;

use App\Slider;

class SliderObserver
{
    /**
     * Handle the slider "created" event.
     *
     * @param  \App\Slider  $slider
     * @return void
     */
    public function created(Slider $slider)
    {
        //
    }

    /**
     * Handle the slider "updated" event.
     *
     * @param  \App\Slider  $slider
     * @return void
     */
    public function updated(Slider $slider)
    {
        if (request()->main_slider) {
            $img = $slider->getOriginal('slider');
            $path = 'uploads/sliders/main/' . $img;
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    /**
     * Handle the slider "deleted" event.
     *
     * @param  \App\Slider  $slider
     * @return void
     */
    public function deleted(Slider $slider)
    {
		if (file_exists('uploads/sliders/main/' . $slider->slider)) {
			unlink('uploads/sliders/main/' . $slider->slider);
		}
    }

    /**
     * Handle the slider "restored" event.
     *
     * @param  \App\Slider  $slider
     * @return void
     */
    public function restored(Slider $slider)
    {
        //
    }

    /**
     * Handle the slider "force deleted" event.
     *
     * @param  \App\Slider  $slider
     * @return void
     */
    public function forceDeleted(Slider $slider)
    {
        //
    }
}
