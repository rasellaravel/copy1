<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InnerMenuInfo extends Model
{
    protected $table = 'inner_menu_info';
    protected $guarded = [];
    public function innerMenu()
    {
        return $this->belongsTo(InnerMenu::class);
    }
}
