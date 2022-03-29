<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
}
