<?php
namespace App\Helpers;

class UrlHelper
{
    public static function product($item)
    {
        $url = [$item->menu->slug->{'slug_' . app()->getLocale()}];
        if ($item->subMenu) {
            $url[] = $item->subMenu->slug->{'slug_' . app()->getLocale()};
        }
        if ($item->innerMenu) {
            $url[] = $item->innerMenu->slug->{'slug_' . app()->getLocale()};
        }
        $url[] = $item->slug->{'slug_' . app()->getLocale()};
        return $url;
    }
}
