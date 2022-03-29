<?php

namespace App;

use App\MyViewed;
use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Slugable;
    protected $guarded = [];

    protected $table = 'products';

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
    public function subMenu()
    {
        return $this->belongsTo('App\SubMenu', 'sub_menu_id', 'id');
    }
    public function vendor()
    {
        return $this->belongsTo(Admin::class, 'vendor_id', 'id');
    }
    public function shippingCategory()
    {
        return $this->belongsTo(ShippingCategory::class, 'shipping_category_id', 'id');
    }
    public function innerMenu()
    {
        return $this->belongsTo('App\InnerMenu', 'inner_menu_id', 'id');
    }
    public function productAltImages()
    {
        return $this->hasMany('App\ProductImage', 'pro_id');
    }
    public function productSpecifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }
    public function productPrice()
    {
        return $this->belongsTo('App\ProductPrice', 'id', 'pro_id');
    }
    public function productSizes()
    {
        return $this->hasMany('App\ProductSize', 'product_id');
    }

    public function slug()
    {
        return $this->morphOne(Slug::class, 'slugable');
    }
    public function views()
    {
        return $this->morphMany(MostViewed::class, 'viewable');
    }
    public function myView()
    {
        return $this->hasOne(MyViewed::class);
    }
}
