<?php

namespace App\Http\Controllers\User;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\ListingController;
use App\Menu;
use App\Page;
use App\Product;
use App\Services\GetCartService;
use App\Slug;
use App\SubMenu;
use Illuminate\Http\Request;
use Session;

class RouteController extends Controller
{
    public function path(Request $req, $path)
    {
        $data['data'] = Page::where('slug', $path)->first();
        if ($data['data']) {
            return view('front-end.page', $data);
        }
        $r = $req->all();
        $ky = array_keys($r);
        if (count($r)) {
            $path = $path . '?' . $ky[0] . '=' . $r[$ky[0]];
        }
        // return $path;

        $menu = Menu::where('url_en', $path)
            ->orWhere('url_lt', $path)
            ->orWhere('url_rus', $path)
            ->first();

        $sub_menu = SubMenu::where('url_en', $path)
            ->orWhere('url_lt', $path)
            ->orWhere('url_rus', $path)
            ->first();

        $product = Product::where('url_en', $path)
            ->orWhere('url_lt', $path)
            ->orWhere('url_rus', $path)
            ->with('productAltImages', 'productPrices')
            ->get();

        if ($menu) {
            $data['locale'] = App::getLocale();
            $data['products'] = Product::where('menu_id', $menu->id)->get()->toArray();
            $data['sm'] = 0;
            $data['menu'] = $menu->toArray();

            if (count($r)) {
                if ($r[$ky[0]] == 'ru') {
                    $req->session()->put('locale', 'rus');
                    App::setlocale('rus');
                } else if ($r[$ky[0]] == 'en') {
                    $req->session()->put('locale', 'en');
                    App::setlocale('en');
                }
            } else {
                $req->session()->put('locale', 'lt');
                App::setlocale('lt');
            }
            return view('font-end.pages.product', $data);
        } elseif ($sub_menu) {
            $data['locale'] = App::getLocale();
            $data['products'] = Product::where('sub_menu_id', $sub_menu->id)->get()->toArray();
            $data['sm'] = $sub_menu->id;
            $data['menu'] = Menu::where('id', $sub_menu->menu_id)->first()->toArray();
            $data['sub_menu'] = $sub_menu->toArray();

            if (count($r)) {
                if ($r[$ky[0]] == 'ru') {
                    $req->session()->put('locale', 'rus');
                    App::setlocale('rus');
                } else if ($r[$ky[0]] == 'en') {
                    $req->session()->put('locale', 'en');
                    App::setlocale('en');
                }
            } else {
                $req->session()->put('locale', 'lt');
                App::setlocale('lt');
            }
            return view('font-end.pages.product', $data);
        } elseif ($product->count()) {
            $data['locale'] = App::getLocale();
            $data['product'] = $product->first()->toArray();
            $data['sm'] = $data['product']['sub_menu_id'];

            if ($data['sm']) {
                $data['sub_menu'] = SubMenu::where('id', $data['product']['sub_menu_id'])->first()->toArray();
                $data['menu'] = Menu::where('id', $data['product']['menu_id'])->first()->toArray();
                $data['releteds'] = Product::where('menu_id', $data['product']['menu_id'])
                    ->where('sub_menu_id', $data['product']['sub_menu_id'])
                    ->whereNotIn('id', [$data['product']['id']])
                    ->limit(4)
                    ->get()
                    ->toArray();
            } else {
                $data['menu'] = Menu::where('id', $data['product']['menu_id'])->first()->toArray();
                $data['releteds'] = Product::where('menu_id', $data['product']['menu_id'])
                    ->whereNotIn('id', [$data['product']['id']])
                    ->limit(4)
                    ->get()
                    ->toArray();
            }
            $myvpro = (array) json_decode(@$_COOKIE['myVisitPro']);
            $arr = [];
            if ($myvpro) {
                $arr = $myvpro;
                if (!in_array($data['product']['id'], $arr)) {
                    $myvproC = @$_COOKIE['myVisitProC'];
                    if ($myvproC == 10) {
                        $tmpC = 1;
                    } else {
                        $tmpC = $myvproC + 1;

                    }

                    $arr[$tmpC] = $data['product']['id'];
                    setcookie('myVisitPro', json_encode($arr), time() + (86400 * 30 * 12), "/");
                    setcookie('myVisitProC', $tmpC, time() + (86400 * 30 * 12), "/");
                }
            } else {
                $arr[1] = $data['product']['id'];
                setcookie('myVisitPro', json_encode($arr), time() + (86400 * 30 * 12), "/");
                setcookie('myVisitProC', 1, time() + (86400 * 30 * 12), "/");
            }

            if (count($r)) {
                if ($r[$ky[0]] == 'ru') {
                    $req->session()->put('locale', 'rus');
                    App::setlocale('rus');
                } else if ($r[$ky[0]] == 'en') {
                    $req->session()->put('locale', 'en');
                    App::setlocale('en');
                }
            } else {
                $req->session()->put('locale', 'lt');
                App::setlocale('lt');
            }
            return view('font-end.pages.product-single', $data);
        } else {
            return redirect('/');
        }
    }
    public function slugUrl($slug, $slug1 = null, $slug2 = null, $slug3 = null)
    {

        
        $listing_controller = new ListingController;
        $last_slug = collect(request()->segments())->last();

        if (request()->segment(1) == 'search-result') {
            if (session()->has('search_txt')) {
                if (array_key_exists($last_slug, session()->get('search_txt'))) {
                    $src = session()->get('search_txt')[$last_slug];
                    $data = $listing_controller->products(null, $src);
                    if (request()->page) {
                        return view('front-end.pages.paginate-product', $data)->render();
                    }

                    return view('front-end.pages.products', $data);

                }
            }
        }
        $slug = Slug::where('slug_' . app()->getLocale(), $last_slug)->first();
        if ($slug) {
            $model = $slug->slugable;
            if (class_basename($model) == "Menu" || class_basename($model) == "SubMenu" || class_basename($model) == "InnerMenu") {
                $data = $listing_controller->products($model);
                // dd(request()->all());
                if (request()->page) {
                    return view('front-end.pages.paginate-product', $data)->render();
                }
                $this->setAsViewed($model);
                //dd($data);
                return view('front-end.pages.products', $data);
            }
            if (class_basename($model) == "Product") {
                $data['product'] = $model;
                $ip = request()->ip();
                if ($ip == '::1' || $ip == '127.0.0.1') {
                    $ip = '203.78.146.6';
                }
                $url = 'http://ip-api.com/json/' . $ip;
                $ip_info = file_get_contents($url);
                $user_info = json_decode($ip_info, true);
                $country_code = $user_info['countryCode'];
                $data['shipping'] = GetCartService::shippingPrice($country_code, $data['product'], null);

                if (session()->has('my_view')) {
                    if (session()->get('my_view') != collect(request()->segments())->last()) {
                        session()->forget('my_view');
                    }
                }
                $this->setAsViewed($model);
                $this->setMyView($model);
                if($data['product']['inner_menu_id']){
                    $data['releteds'] = Product::where('menu_id', $data['product']['menu_id'])
                    ->with('productPrice','productSizes')
                    ->where('sub_menu_id', $data['product']['sub_menu_id'])
                    ->where('inner_menu_id', $data['product']['inner_menu_id'])
                    ->whereNotIn('id', [$data['product']['id']])
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
                }else if($data['product']['sub_menu_id']){
                    $data['releteds'] = Product::where('menu_id', $data['product']['menu_id'])
                    ->with('productPrice','productSizes')
                    ->where('sub_menu_id', $data['product']['sub_menu_id'])
                    ->whereNotIn('id', [$data['product']['id']])
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
                }else{
                    $data['releteds'] = Product::where('menu_id', $data['product']['menu_id'])
                    ->with('productPrice','productSizes')
                    ->whereNotIn('id', [$data['product']['id']])
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
                }
                //dd($data['releteds']);
                //productSizes

                //dd($data['releteds']);
                return view('front-end.pages.product-details', $data);
            }
        }
        $data['data'] = Page::where('slug', $last_slug)->first();
        if ($data['data']) {
            return view('front-end.page', $data);
        }

    }
    public function setAsViewed($model)
    {
        $ip = request()->ip();
        $viewed = $model->views()->where('ip', $ip)->exists();
        if (!$viewed) {
            $model->update(['total_view' => $model->total_view + 1]);
            $model->views()->create([
                'ip' => $ip,
            ]);
        }

    }
    public function setMyView($model)
    {
        if (!session()->has('my_view')) {
            session()->put('my_view', collect(request()->segments())->last());
            $ip = request()->ip();
            $viewed = $model->myView()->where('ip', $ip)->exists();
            if (!$viewed) {
                $model->myView()->create([
                    'ip' => $ip,
                    'count' => 1,
                ]);
            } else {
                $model->myView->update([
                    'count' => $model->myView->count + 1,
                ]);
            }
        }

    }
    public function setLanguage($language)
    {
        $previous = url()->previous();
        if (app('router')->getRoutes()->match(app('request')->create($previous))->getName() == "user.slugUrl") {
            $rep = str_replace(url('/'), '', $previous);
            $ex = explode('/', $rep);
            if ($ex[1] != 'search-result') {
                $back_url = [];
                for ($i = 0; $i < count($ex); $i++) {
                    $tmp = $ex[$i];
                    if ($i != 0) {
                        $slug = Slug::where('slug_' . app()->getLocale(), $tmp)->first();
                        $tmp = @$slug->{'slug_' . $language};
                    }
                    $back_url[] = $tmp;
                }
                request()->session()->put('locale', $language);
                return redirect(implode('/', $back_url));
            }
        }
        request()->session()->put('locale', $language);
        return redirect()->back();
    }
}
