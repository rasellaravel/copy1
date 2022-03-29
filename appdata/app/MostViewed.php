<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MostViewed extends Model
{
    protected $guarded = [];
    public function viewable()
    {
        return $this->morphTo();
    }
}
