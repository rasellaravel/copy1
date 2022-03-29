<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    protected $fillable = ['size_en', 'size_lt', 'size_rus', 'size_pt', 'size_es', 'custom_size_id'];

    public function customSize()
    {
        return $this->belongsTo(CustomSize::class);
    }
}
