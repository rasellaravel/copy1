<?php

namespace App\Http\Controllers\User;

use App\Blog;
use App\InnerMenu;
use App\Menu;
use App\Product;
use App\Services\MakeUrlService;
use App\SubMenu;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        foreach ($products as $key => $value) {
            if ($value->productSizes == null) {
                dd($value->id);
            }
        }
        session()->forget('search_txt');
        
        $data['blogs'] = Blog::orderBy('id', 'desc')->get();
        return view('front-end.pages.home', $data);
    }
    public function discountPro()
    {
        return view('front-end.discount-pro');
    }
    public function blogs()
    {
        $data['blogs'] = Blog::orderBy('id', 'desc')->get();
        return view('front-end.bloglist-one', $data);
    }
    public function blogDetails($slug, $id)
    {
        $data['blog'] = Blog::find($id);
        return view('front-end.post-details', $data);
    }
    public function contact()
    {
        return view('front-end.contact-us');
    }
    public function search()
    {
        $src = request()->src;
        $menus = Menu::where('menu_' . app()->getLocale(), 'LIKE', '%' . $src . '%')
            ->limit(6)
            ->with('slug')
            ->get()
            ->toArray();
        $sub_menus = SubMenu::where('sub_menu_' . app()->getLocale(), 'LIKE', '%' . $src . '%')
            ->limit(6)
            ->with('slug', 'menu.slug')
            ->get()
            ->toArray();
        $inner_menus = InnerMenu::where('inner_menu_' . app()->getLocale(), 'LIKE', '%' . $src . '%')
            ->limit(6)
            ->with('slug', 'menu.slug', 'subMenu.slug')
            ->get()
            ->toArray();

        $filter_category = [];
        $cnt = 2;
        $m = 0;
        $sm = 0;
        $im = 0;
        for ($i = 0; $i < $cnt; $i++) {
            if (array_key_exists($m, $menus)) {
                $filter_category['a' . $m] = [
                    'title' => $menus[$m]['menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$menus[$m]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($menus[$m++]);
                continue;
            }
            if (array_key_exists($sm, $sub_menus)) {
                $filter_category['b' . $sm] = [
                    'title' => $sub_menus[$sm]['sub_menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$sub_menus[$sm]['menu']['slug']['slug_' . app()->getLocale()], $sub_menus[$sm]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($sub_menus[$sm++]);
                continue;
            }
            if (array_key_exists($im, $inner_menus)) {
                $filter_category['c' . $im] = [
                    'title' => $inner_menus[$im]['inner_menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$inner_menus[$im]['menu']['slug']['slug_' . app()->getLocale()], $inner_menus[$im]['sub_menu']['slug']['slug_' . app()->getLocale()], $inner_menus[$im]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($inner_menus[$im++]);
                continue;
            }
        }
        for ($i = 0; $i < $cnt; $i++) {
            if (array_key_exists($sm, $sub_menus)) {
                $filter_category['b' . $sm] = [
                    'title' => $sub_menus[$sm]['sub_menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$sub_menus[$sm]['menu']['slug']['slug_' . app()->getLocale()], $sub_menus[$sm]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($sub_menus[$sm++]);
                continue;
            }
            if (array_key_exists($m, $menus)) {
                $filter_category['a' . $m] = [
                    'title' => $menus[$m]['menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$menus[$m]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($menus[$m++]);
                continue;
            }
            if (array_key_exists($im, $inner_menus)) {
                $filter_category['c' . $im] = [
                    'title' => $inner_menus[$im]['inner_menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$inner_menus[$im]['menu']['slug']['slug_' . app()->getLocale()], $inner_menus[$im]['sub_menu']['slug']['slug_' . app()->getLocale()], $inner_menus[$im]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($inner_menus[$im++]);
                continue;
            }
        }
        for ($i = 0; $i < $cnt; $i++) {
            if (array_key_exists($im, $inner_menus)) {
                $filter_category['c' . $im] = [
                    'title' => $inner_menus[$im]['inner_menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$inner_menus[$im]['menu']['slug']['slug_' . app()->getLocale()], $inner_menus[$im]['sub_menu']['slug']['slug_' . app()->getLocale()], $inner_menus[$im]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($inner_menus[$im++]);
                continue;
            }
            if (array_key_exists($m, $menus)) {
                $filter_category['a' . $m] = [
                    'title' => $menus[$m]['menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$menus[$m]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($menus[$m++]);
                continue;
            }
            if (array_key_exists($sm, $sub_menus)) {
                $filter_category['b' . $sm] = [
                    'title' => $sub_menus[$sm]['sub_menu_' . app()->getLocale()],
                    'url' => route('user.slugUrl', [$sub_menus[$sm]['menu']['slug']['slug_' . app()->getLocale()], $sub_menus[$sm]['slug']['slug_' . app()->getLocale()]]),
                ];
                unset($sub_menus[$sm++]);
                continue;
            }
        }
        ksort($filter_category);
        $data['src_txt'] = $src;
        $data['src_category'] = array_values($filter_category);
        $data['src_product'] = Product::where('title_' . app()->getLocale(), 'LIKE', '%' . $src . '%')
            ->with('productPrice', 'slug', 'menu.slug', 'subMenu.slug', 'innerMenu.slug')
            ->limit(20)
            ->orderBy('id', 'desc')
            ->get();
        session()->put('search_txt', [MakeUrlService::url($src) => $src]);
        
        $html = view('front-end.igonet_module.box.igonet-box-4', $data)->render();
        return $html;
    }

    public function errorPages()
    {
        return view('front-end.404-page');
    }

}
