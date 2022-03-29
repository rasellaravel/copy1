<?php
namespace App\Services;

// use App\Services\TestService1;
/**
 *
 */
class ImageService
{
    public static function compressImage($source, $destination, $quality)
    {
        $extension = pathinfo($source, PATHINFO_EXTENSION);
        dd($extension);
        if ($extension == 'jpeg' || $extension == 'jpg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($extension == 'gif') {
            $image = imagecreatefromgif($source);
        } elseif ($extension == 'png') {
            $image = imagecreatefrompng($source);
        }

        imagewebp($image, $destination, $quality);
    }

}
