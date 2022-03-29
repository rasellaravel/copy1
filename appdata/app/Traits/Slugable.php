<?php

namespace App\Traits;

use App\Slug;
use Illuminate\Support\Str;

trait Slugable
{
    public static function boot()
    {
        parent::boot();
        static::saved(function ($model) {
            if ($model->slugs) {
                $changed = $model->getDirty();
                if (count($changed) > 1) {
                    $model->slugs->delete();
                    self::addSlug($model);
                }
                // self::addSlug($model);
            } else {
                self::addSlug($model);
            }
        });
    }
    public static function addSlug($model)
    {
        if (class_basename($model) == "Slug") {
            return;
        } elseif (class_basename($model) == 'Menu') {
            $name = 'menu';
        } elseif (class_basename($model) == 'SubMenu') {
            $name = 'sub_menu';
        } elseif (class_basename($model) == 'InnerMenu') {
            $name = 'inner_menu';
        } elseif (class_basename($model) == 'Product') {
            $name = 'title';
        }
        $languages = ['en', 'lt', 'rus', 'pt', 'es'];
        $slug = [];
        foreach ($languages as $language) {
            $slug[$language] = Str::slug($model->{$name . '_' . $language});
        }
        $slug_exists = self::checkSlugExists($slug);
        $data = [];
        foreach ($slug_exists as $key => $value) {
            if ($value) {
                $new_slug = self::makeSlug($slug[$key], $key);
                $slug_exists[$key] = false;
                $data['slug_' . $key] = $new_slug;
            } else {
                $data['slug_' . $key] = $slug[$key];
            }
        }
        $data['slugable_id'] = $model->id;
        $data['slugable_type'] = get_class($model);

        Slug::create($data);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    private static function checkSlugExists($slug)
    {
        $error = [];
        foreach ($slug as $key => $value) {
            if (Slug::where('slug_' . $key, $value)->exists()) {
                $error[$key] = true;
            } else {
                $error[$key] = false;
            }
        }
        return $error;
    }
    private static function makeSlug($slug, $key)
    {
        $count = 0;
        $tem_slug = $slug;
        while (Slug::where('slug_' . $key, $tem_slug)->exists()) {
            $count++;
            $tem_slug = $slug . '-' . dechex($count);
        }
        return $tem_slug;
    }
}
