<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    protected $casts = [
        'size' => 'json',
    ];
    protected $table = 'carts';
    protected $guarded;

    public function productColor()
    {
        return $this->belongsTo(CustomColor::class, 'color', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function customColor()
    {
        return $this->belongsTo(CustomColor::class, 'color', 'id');
    }
    public function YarnColor()
    {
        return $this->belongsTo(YarnColor::class, 'yarn_color', 'id');
    }
    public function sizes()
    {
        return $this->belongsToJson(Size::class, 'size');
    }

    public function customClasp()
    {
        return $this->belongsTo(CustomClasp::class, 'clasp', 'id');
    }

    public function surfaceAmber()
    {
        return $this->belongsTo(SurfaceAmber::class, 'surface_amber', 'id');
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
