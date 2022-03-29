<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $table = 'blogs';
	
	public function menu()
	{
		return $this->belongsTo('App\Menu', 'menu_id', 'id');
	}
	public function subMenu()
	{
		return $this->belongsTo('App\SubMenu', 'sub_menu_id', 'id');
	}
}
