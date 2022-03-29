<?php
namespace App\Helpers;

class PriceHelper
{
    public static function discount($item)
    {
        return $item->productPrice->discount ? $item->productPrice->price - ($item->productPrice->price * $item->productPrice->discount) / 100 : $item->productPrice->price;
    }
    public static function discountByPrice($discount, $price)
    {
        return $discount ? $price - ($price * $discount) / 100 : $price;
    }
}
