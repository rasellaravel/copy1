<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
	protected $table = 'favourites';
	protected $guarded;
	public function productPrice(){
		return $this->belongsTo('App\ProductPrice', 'product_id', 'pro_id');
	}
	public function products(){
		return $this->belongsTo('App\Product', 'product_id', 'id');
	}

}
