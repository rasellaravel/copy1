<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomSize extends Model
{
    protected $table = 'custom_sizes';

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function innerMenus()
    {
        return $this->hasMany(InnerMenu::class);
    }
}
