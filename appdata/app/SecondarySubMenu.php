<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondarySubMenu extends Model
{
	protected $table = 'secondary_sub_menus';
	
	public function scdMenu()
	{
		return $this->belongsTo('App\SecondaryMenu', 'menu_id', 'id');
	}
}
