<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingSetting extends Model
{
    public function getMinPriceAttribute($value)
    {
        $check = CurrencyRate::where('name', config('app.currency'))->first();
        if ($check) {
            $rate = $check->rate;
        } else {
            $rate = 1;
        }
        return $value * $rate;
    }
}
