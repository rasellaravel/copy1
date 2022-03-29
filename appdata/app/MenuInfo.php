<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuInfo extends Model
{
    protected $table = 'menu_info';
    protected $guarded = [];
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
