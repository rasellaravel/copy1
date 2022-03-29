<?php
namespace App\Helpers;

use Intervention\Image\Facades\Image;

class ImageHelper
{
    public static function save($item, $name, $ext, $path, $dimensions)
    {
        if (count($dimensions)) {
            foreach ($dimensions as $key => $r_width) {
                self::convert($item, $key . '-' . $name, $ext, $path, $r_width);
            }
        } else {
            Image::make($item)->orientate()->encode($ext, 50)->save($path . $name . '.' . $ext);
        }
    }
    private static function convert($item, $name, $ext, $path, $r_width)
    {
        [$width, $height] = getimagesize($item);
        if ($r_width > $width) {
            $r_width = $width;
        }

        $r_height = ($height / $width) * $r_width;
        $img = $name . '.' . $ext;
        Image::make($item)->encode($ext, 90)->orientate()->resize($r_width, null,function($constraint){$constraint->aspectRatio();})->save($path . $img);
    }
}
