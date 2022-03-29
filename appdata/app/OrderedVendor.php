<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedVendor extends Model
{
    protected $guarded = [];
    public function ordered_product()
    {
        return $this->hasMany(OrderedProduct::class, 'ordered_vendor_id', 'id');
    }
    public function vendor()
    {
        return $this->belongsTo(Admin::class, 'vendor_id', 'id');
    }
    public function getTotalAttribute($value)
    {
        $check = CurrencyRate::where('name', config('app.currency'))->first();
        if ($check) {
            $rate = $check->rate;
        } else {
            $rate = 1;
        }
        return $value * $rate;
    }
    public function getShippingCostAttribute($value)
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
