<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    protected $table = 'product_prices';

    protected $casts = [
        'custom_clasp_id' => 'json',
        'custom_color_id' => 'json',
        'surface_amber_id' => 'json',
        'yarn_color_id' => 'json',
    ];

    public function products()
    {
        return $this->belongsTo('App\Product', 'pro_id', 'id');
    }
    public function customClasps()
    {
        return $this->belongsToJson(CustomClasp::class, 'custom_clasp_id');
    }
    public function customColors()
    {
        return $this->belongsToJson(CustomColor::class, 'custom_color_id');
    }
    public function yarnColors()
    {
        return $this->belongsToJson(YarnColor::class, 'yarn_color_id');
    }
    public function surfaceAmbers()
    {
        return $this->belongsToJson(SurfaceAmber::class, 'surface_amber_id');
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
