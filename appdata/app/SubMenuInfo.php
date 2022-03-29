<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenuInfo extends Model
{
    protected $table = 'sub_menu_info';
    protected $guarded = [];
    public function subMenu()
    {
        return $this->belongsTo(SubMenu::class);
    }
}
