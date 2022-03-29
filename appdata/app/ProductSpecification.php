<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    public function specification()
    {
        return $this->belongsTo(Specification::class);

    }
}
