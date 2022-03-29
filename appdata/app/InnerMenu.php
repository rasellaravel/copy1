<?php

namespace App;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class InnerMenu extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships, Slugable;
    protected $table = 'inner_menus';
    protected $guarded = [];
    protected $casts = [
        'custom_size_id' => 'json',
        'custom_clasp_id' => 'json',
        'surface_amber_id' => 'json',
        'specification_id' => 'json',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function subMenu()
    {
        return $this->belongsTo(SubMenu::class);
    }
    public function customSizes()
    {
        return $this->belongsToJson(CustomSize::class, 'custom_size_id');
    }
    public function sizes()
    {
        return $this->belongsToJson(Size::class, 'custom_size_id', 'custom_size_id');
    }
    public function customClasps()
    {
        return $this->belongsToJson(CustomClasp::class, 'custom_clasp_id');
    }
    public function surfaceAmbers()
    {
        return $this->belongsToJson(SurfaceAmber::class, 'surface_amber_id');
    }
    public function specifications()
    {
        return $this->belongsToJson(Specification::class, 'specification_id');
    }
    public function innerMenuInfo()
    {
        return $this->hasOne(InnerMenuInfo::class);
    }
    public function slug()
    {
        return $this->morphOne(Slug::class, 'slugable');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'inner_menu_id');
    }
    public function views()
    {
        return $this->morphMany(MostViewed::class, 'viewable');
    }
}
