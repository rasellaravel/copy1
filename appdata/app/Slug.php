<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    protected $guarded = [];

    public function slugable()
    {
       return $this->morphTo();
    }
}