<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    protected $casts = [
        'size_id' => 'json',
    ];

    protected $table = 'product_sizes';

    // public function sizes()
    // {
    //     return $this->hasMany(Size::class);
    // }

    public function sizes()
    {
        return $this->belongsToJson(Size::class, 'size_id');
    }

    public function customColor()
    {
        return $this->belongsToJson(CustomColor::class, 'custom_color_id');
    }
    public function getPriceAttribute($value)
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
