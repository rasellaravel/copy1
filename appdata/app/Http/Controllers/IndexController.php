<?php

namespace App\Http\Controllers;

use App;
use App\About;
use App\Blog;
use App\CertificatePassword;
use App\Contact;
use App\HomeBlog;
use App\Menu;
use App\MenuMainDescription;
use App\Partner;
use App\Product;
use App\ProSlider;
use App\SecondaryMenu;
use App\Services\MakeUrlService;
use App\Slider;
use App\SubMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function index()
    {
        // dd(App\Services\MakeUrlService::url('naujos-atsargos'));
        $data['locale'] = App::getLocale();
        $data['main_sliders'] = Slider::get()->toArray();
        $data['second_sliders'] = ProSlider::get();
        $data['blogs'] = HomeBlog::get()->toArray();
        $data['scd_menus'] = SecondaryMenu::get()->toArray();
        $vproid = (array) json_decode(@$_COOKIE['myVisitPro']);
        $data['visit_pro'] = Product::whereIn('id', $vproid)->with('menu', 'subMenu')->get()->toArray();
        return view('font-end.index', $data);
    }

    public function allMenu()
    {
        $data['locale'] = App::getLocale();
        $data['menus'] = Menu::get()->toArray();
        $data['mmd'] = MenuMainDescription::first()->toArray();
        return view('font-end.pages.all-menu', $data);
    }

    public function subMenus($title, $id)
    {
        $data['locale'] = App::getLocale();
        $data['menu'] = Menu::find($id)->toArray();
        $data['sub_menus'] = SubMenu::where('menu_id', $id)->get()->toArray();
        $data['mnu2'] = 'catalog';
        return view('font-end.pages.all-sub-menu', $data);
    }

    public function newStock()
    {
        $data['locale'] = App::getLocale();
        $data['products'] = Product::where('new_s', 1)->with('menu', 'subMenu')->get()->toArray();
        $data['mnu2'] = 'new_stock';
        return view('font-end.pages.new-stock', $data);
    }
    public function certificates()
    {
        $data['locale'] = App::getLocale();
        $data['mnu2'] = 'certificates';
        return view('font-end.pages.certificates', $data);
    }
    public function certificatesShow()
    {
        $data['locale'] = App::getLocale();
        return view('font-end.pages.certificates-show', $data);
    }
    public function contact()
    {
        $data['locale'] = App::getLocale();
        $data['data'] = Contact::orderBy('id', 'DESC')->first();
        $data['mnu2'] = 'contact';
        return view('font-end.pages.contact', $data);
    }
    public function blogs(Request $request)
    {
        $data['locale'] = App::getLocale();
        $request->session()->forget('view_blog');
        $data['blogs'] = Blog::take(5)->get()->toArray();
        $data['mnu2'] = 'blog';
        return view('font-end.pages.blogs', $data);
    }
    public function getMoreBlogs(Request $request)
    {
        $locale = App::getLocale();
        $value = $request->session()->get('view_blog');
        if ($request->session()->has('view_blog')) {
            $request->session()->put('view_blog', $value + $request->value);
        } else {
            $request->session()->put('view_blog', 5 + $request->value);
        }
        $vl = $request->session()->get('view_blog');

        $blogs = Blog::with('menu', 'subMenu')->limit($vl)->get()->toArray();
        $blogsC = Blog::get()->count();
        $data = [];
        if ($vl >= $blogsC) {
            $data['status'] = 'false';
        } else {
            $data['status'] = 'true';
        }
        $html = '';
        foreach ($blogs as $blog) {
            $html .= '<div class="blog-post">
			<div class="row mar-0 wow slideInUp" style="width: 100%;">
			<div class="col-12 col-md-6">
			<div class="blog-img-b">
			<div class="blog-img">
			<a href="' . route('blogSingle.' . $locale, [MakeUrlService::url($blog['title_' . $locale]), $blog['id']]) . '">';
            if ($blog['img']) {
                $html .= '<img src="' . asset('blog/' . $blog['img']) . '" alt="img">';
            } else {
                $html .= '<img src="' . asset('assets/img/logo.png') . '" alt="img" class="blur-3">';
            }
            $html .= '</a>
			</div>
			</div>
			</div>
			<div class="col-12 col-md-6" style="padding-right: 0;">
			<div class="blog-des">
			<div class="blog-a-d">
			<span class="blog-author">' . __('_lan.published') . '</span>
			<span class="blog-publish">';
            $date = Carbon::parse($blog['created_at']);
            $html .= $date->format('d/m/Y') . '</span>
			</div>
			<div class="blog-tlt">
			<a href="' . route('blogSingle.' . $locale, [MakeUrlService::url($blog['title_' . $locale]), $blog['id']]) . '">' . $blog['title_' . $locale] . '</a>
			</div>
			<div class="blog-txt">' . $blog['description_' . $locale] . '</div>
			<a href="' . route('blogSingle.' . $locale, [MakeUrlService::url($blog['title_' . $locale]), $blog['id']]) . '"> <button class="btn submit-btn read-more"  type="submit">Read More</button></a>
			</div>
			</div>
			</div>
			</div>';
        }
        $data['html'] = $html;
        return $data;
    }

    public function blogSingle(Request $request, $title, $id)
    {
        $data['locale'] = App::getLocale();
        $data['blog'] = Blog::where('id', $id)->with('menu', 'subMenu')->first()->toArray();
        $data['products'] = Product::where('menu_id', $data['blog']['menu_id'])
            ->where('sub_menu_id', $data['blog']['sub_menu_id'])
            ->limit(20)
            ->get()
            ->toArray();
        $data['menu'] = Menu::where('id', $data['blog']['menu_id'])->first()->toArray();
        if ($data['blog']['sub_menu_id']) {
            $data['sub_menu'] = SubMenu::where('id', $data['blog']['sub_menu_id'])->first()->toArray();
        }
        $data['mnu2'] = 'blog';
        // dd($data['products']);
        return view('font-end.pages.blogs-single', $data);
    }

    public function showProducts($m, $sm, $id)
    {
        if (!is_numeric($id)) {
            return redirect('/');
        }
        $data['locale'] = App::getLocale();
        $data['sm'] = $sm;
        if ($sm) {
            $data['products'] = Product::where('sub_menu_id', $id)->get();
            $data['sub_menu'] = SubMenu::where('id', $id)->first();
            $data['menu'] = Menu::where('id', $data['sub_menu']['menu_id'])->first();
        } else {
            $data['products'] = Product::where('menu_id', $id)->get();
            $data['menu'] = Menu::where('id', $id)->first();
        }

        return view('font-end.pages.product', $data);
    }
    public function singleProduct($m, $sm, $title, $id)
    {
        $data['locale'] = App::getLocale();
        $data['sm'] = $sm;
        $product = Product::where('id', $id)->with('productAltImages', 'productPrices')
            ->get();
        $data['product'] = $product->first()->toArray();

        if ($sm) {
            $data['sub_menu'] = SubMenu::where('id', $data['product']['sub_menu_id'])
                ->first()
                ->toArray();
            $data['menu'] = Menu::where('id', $data['product']['menu_id'])
                ->first()
                ->toArray();
            $data['releteds'] = Product::where('menu_id', $data['product']['menu_id'])
                ->where('sub_menu_id', $data['product']['sub_menu_id'])
                ->whereNotIn('id', [$data['product']['id']])
                ->limit(4)
                ->get()
                ->toArray();
        } else {
            $data['menu'] = Menu::where('id', $data['product']['menu_id'])
                ->first()
                ->toArray();
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
            if (!in_array($id, $arr)) {
                $myvproC = @$_COOKIE['myVisitProC'];
                // dd($myvproC);
                if ($myvproC == 10) {
                    $tmpC = 1;
                } else {
                    $tmpC = $myvproC + 1;
                }

                $arr[$tmpC] = $id;
                setcookie('myVisitPro', json_encode($arr), time() + (86400 * 30 * 12), "/");
                setcookie('myVisitProC', $tmpC, time() + (86400 * 30 * 12), "/");
            }
            // setcookie('myVisitProC', 1, time() - (86400 * 30 * 12), "/");
            // setcookie('myVisitPro', json_encode($arr), time() - (86400 * 30 * 12), "/");
        } else {
            $arr[1] = $id;
            setcookie('myVisitPro', json_encode($arr), time() + (86400 * 30 * 12), "/");
            setcookie('myVisitProC', 1, time() + (86400 * 30 * 12), "/");
        }
        // dd($myvpro);
        // dd($data['releteds']->toArray());
        return view('font-end.pages.product-single', $data);
    }

    public function aboutUs()
    {
        $data['locale'] = App::getLocale();
        $data['about'] = About::orderBy('id', 'DESC')->first()->toArray();
        $data['mnu2'] = 'about';
        return view('font-end.pages.about-us', $data);
    }
    public function partners()
    {
        $data['locale'] = App::getLocale();
        $data['partners'] = Partner::get();
        $data['mnu2'] = 'partner';
        return view('font-end.pages.partners', $data);
    }
    public function searchProduct(Request $req)
    {
        $v = $req->v;
        $locale = App::getLocale();
        $products = Product::where(function ($q) use ($v) {
            $q->where('title_en', 'like', $v . '%')
                ->orWhere('title_lt', 'like', $v . '%')
                ->orWhere('title_rus', 'like', $v . '%');
        })
            ->orderBy('title_' . $locale)
            ->limit(10)
            ->with('menu', 'subMenu')
            ->get()
            ->toArray();
        // return $products;

        $html = '<ul>';
        if (count($products)) {
            foreach ($products as $pro) {
                if ($pro['sub_menu_id']) {
                    $pro_link = route('singleProduct.' . $locale, [MakeUrlService::url($pro['menu']['menu_' . $locale]), MakeUrlService::url($pro['sub_menu']['sub_menu_' . $locale]), MakeUrlService::url($pro['title_' . $locale]), $pro['id']]);
                } else {
                    $pro_link = route('singleProduct.' . $locale, [MakeUrlService::url($pro['menu']['menu_' . $locale]), 0, MakeUrlService::url($pro['title_' . $locale]), $pro['id']]);
                }

                $html .= '<li><a href="' . $pro_link . '">' . $pro['title_' . $locale] . '</a></li>';
            }
        } else {
            $html .= '<li>No result found.</li>';
        }
        $html .= '</ul>';
        return $html;
    }
    public function checkCertificatedPass(Request $req)
    {
        $cer_pass = CertificatePassword::where('password', md5($req->password))->first();
        // dd($cer_pass);
        if ($cer_pass) {
            return redirect('certificates-show');
        }

        return back()->with(['error' => 'Password not match.']);
    }
    public function changeLan(Request $req, $ln)
    {
        $b_url = url('/');
        $url = url()->previous();
        $u = explode('/', str_replace($b_url . '/', '', $url));
        $l = App::getLocale();
        // dd($u);
        if (count($u) == 1 && $u[0] != null) {
            $k = array_search(urldecode($u[0]), trans('_lan', [], $l));

            $req->session()->put('locale', $ln);

            if ($k == false) {
                return redirect('/');
            }
            return redirect(trans('_lan', [], $ln)[$k]);
        } else if (count($u) == 3) {
            if (!is_numeric($u[2])) {
                $url_r = urldecode(str_replace($b_url . '/', '', $url));
                $menu_r = Menu::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                $sub_menu_r = SubMenu::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                $product_r = Product::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                if ($menu_r) {
                    $menu_r = $menu_r->toArray();
                    return redirect($menu_r['url_' . $ln]);
                } else if ($sub_menu_r) {
                    $sub_menu_r = $sub_menu_r->toArray();
                    return redirect($sub_menu_r['url_' . $ln]);
                } else {
                    $product_r = $product_r;
                    // dd(urldecode($url_r));
                    return redirect($product_r['url_' . $ln]);
                }
            }
            $k = array_search(urldecode($u[0]), trans('_lan', [], $l));
            $blog_t = Blog::where('id', $u[2])->first()->toArray()['title_' . $ln];
            $req->session()->put('locale', $ln);

            if ($k == false) {
                return redirect('/');
            }
            return redirect(trans('_lan', [], $ln)[$k] . '/' . MakeUrlService::url($blog_t) . '/' . $u[2]);
        } else if (count($u) == 4) {
            if (!is_numeric($u[3])) {
                $url_r = urldecode(str_replace($b_url . '/', '', $url));
                $menu_r = Menu::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                $sub_menu_r = SubMenu::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                $product_r = Product::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                if ($menu_r) {
                    $menu_r = $menu_r->toArray();
                    return redirect($menu_r['url_' . $ln]);
                } else if ($sub_menu_r) {
                    $sub_menu_r = $sub_menu_r->toArray();
                    return redirect($sub_menu_r['url_' . $ln]);
                } else {
                    $product_r = $product_r;
                    // dd(urldecode($url_r));
                    return redirect($product_r['url_' . $ln]);
                }
            }
            $k = array_search(urldecode($u[0]), trans('_lan', [], $l));
            if ($u[2] == '0') {
                $sub_menu = 0;
                $menu = Menu::where('id', $u[3])->first()->toArray()['menu_' . $ln];
            } else {
                $sub_menu = SubMenu::where('id', $u[3])->first()->toArray();
                $menu = Menu::where('id', $sub_menu['menu_id'])->first()->toArray()['menu_' . $ln];
                $sub_menu = $sub_menu['sub_menu_' . $ln];
            }
            $req->session()->put('locale', $ln);

            if ($k == false) {
                return redirect('/');
            }
            // dd(MakeUrlService::url($menu));
            return redirect(trans('_lan', [], $ln)[$k] . '/' . MakeUrlService::url($menu) . '/' . MakeUrlService::url($sub_menu) . '/' . $u[3]);
        } else if (count($u) == 5) {
            if (!is_numeric($u[4])) {
                $url_r = urldecode(str_replace($b_url . '/', '', $url));
                $menu_r = Menu::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                $sub_menu_r = SubMenu::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                $product_r = Product::where('url_en', $url_r)
                    ->orWhere('url_lt', $url_r)
                    ->orWhere('url_rus', $url_r)
                    ->first();

                if ($menu_r) {
                    $menu_r = $menu_r->toArray();
                    return redirect($menu_r['url_' . $ln]);
                } else if ($sub_menu_r) {
                    $sub_menu_r = $sub_menu_r->toArray();
                    return redirect($sub_menu_r['url_' . $ln]);
                } else {
                    $product_r = $product_r;
                    // dd(urldecode($url_r));
                    return redirect($product_r['url_' . $ln]);
                }
            }
            $k = array_search(urldecode($u[0]), trans('_lan', [], $l));
            $pro = Product::where('id', $u[4])->first()->toArray();
            $menu = Menu::where('id', $pro['menu_id'])->first()->toArray()['menu_' . $ln];
            if ($pro['sub_menu_id'] == 0) {
                $sub_menu = 0;
            } else {
                $sub_menu = SubMenu::where('id', $pro['sub_menu_id'])->first()->toArray()['sub_menu_' . $ln];
            }
            $pro = $pro['title_' . $ln];
            $req->session()->put('locale', $ln);

            if ($k == false) {
                return redirect('/');
            }
            return redirect(trans('_lan', [], $ln)[$k] . '/' . MakeUrlService::url($menu) . '/' . MakeUrlService::url($sub_menu) . '/' . MakeUrlService::url($pro) . '/' . $u[4]);
        } else {
            $req->session()->put('locale', $ln);
            return back();
        }
    }
}
