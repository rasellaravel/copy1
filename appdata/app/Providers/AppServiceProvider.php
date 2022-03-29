<?php

namespace App\Providers;

use App\Blog;
use App\Favourite;
use App\Menu;
use App\Observers\BlogObserver;
use App\Observers\ProductImageObserver;
use App\Observers\ProductObserver;
use App\Observers\SliderObserver;
use App\Product;
use App\ProductImage;
use App\Services\GetCartService;
use App\Slider;
use App\Page;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Size::observe(SizeObserver::class);
        // CustomSize::observe(CustomSizeObserver::class);
        Product::observe(ProductObserver::class);
        ProductImage::observe(ProductImageObserver::class);
        Slider::observe(SliderObserver::class);
        Blog::observe(BlogObserver::class);
        View::composer(['front-end.pages.inc.footer'], function ($view) {
            $gPages = Page::all();
            $view->with(['gPages' => $gPages]);
        });

        View::composer(['front-end.pages.inc.header', 'front-end.landing-page', 'front-end.layouts.footer'], function ($view) {
            $menus = Menu::with('slug', 'subMenus.slug', 'subMenus.innerMenus.slug')
                ->inRandomOrder()
                ->get();
            $view->with(['menus' => $menus]);
        });
        View::composer(['front-end.pages.home', 'front-end.discount-pro'], function ($view) {
            $limit = 10;
            $discount_products = Product::inRandomOrder()
                ->whereHas('productPrice', function ($q) {
                    $q->whereNotNull('discount');
                })
                ->with([
                    'productPrice',
                    'productAltImages',
                ])
                ->limit($limit)
                ->get();
            $menus_list = Menu::orderBy('total_view', 'desc')
                ->with([
                    'menuInfo',
                    'slug',
                ])
                ->get()
                ->take(6);

            $view->with(['discount_products' => $discount_products, 'menus_list' => $menus_list]);
        });
        View::composer(['front-end.pages.home', 'front-end.listing-three'], function ($view) {
            $limit = 12;
            $ip = request()->ip();

            $my_viewed_products = Product::whereHas('myView', function ($q) use ($ip) {
                $q->where('ip', $ip);
            })
                ->with('myView')
                ->get()
                ->sortByDesc('myView.count')
                ->take($limit);

            $view->with(['my_viewed_products' => $my_viewed_products]);
        });
        View::composer(['front-end.pages.home', 'front-end.product-details'], function ($view) {
            $limit = 10;

            $viewed_products = Product::orderBy('total_view', 'desc')
                ->with([
                    'productPrice',
                    'productAltImages',
                ])
                ->limit($limit)
                ->get();

            $view->with(['viewed_products' => $viewed_products]);
        });

        View::composer(['front-end.pages.inc.header', 'front-end.pages.cart'], function ($view) {
            $carts = GetCartService::cartInfo();
            $view->with(['carts' => $carts]);
        });
        View::composer(['front-end.*'], function ($view) {
            if (auth()->check()) {
                $favorites = Favourite::where('user_id', auth()->user()->id)
                    ->pluck('product_id');
                $favorites = Product::whereIn('id', $favorites)
                    ->with('productAltImages', 'productSizes', 'productPrice')
                    ->get();
            } else {
                $favorites = (array) json_decode(Cookie::get('favorite_items'));
                $ids = array_keys($favorites);
                $favorites = Product::whereIn('id', $ids)
                    ->with('productAltImages', 'productSizes', 'productPrice')
                    ->get();
            }
            $view->with(['favorites' => $favorites]);
        });

    }
}
