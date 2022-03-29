<?php

use App\ProductShippingCategory;

Route::get('/clear-cache', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/abc', function(){
    $getShippingCategory = ProductShippingCategory::where('product_id', 53)
        ->pluck('shipping_category_id')->toArray();
        dd($getShippingCategory);
});
Route::get('language/{ln}', 'User\RouteController@setLanguage')->name('language');
Route::get('currency/{type}', 'User\CurrencyController@setCurrency')->name('currency.set');
Route::post('get-price-by-filter', 'User\ListingController@getPriceByFilter')->name('filter.price.get');

Route::get('/', 'User\HomeController@index')->name('home');
Route::name('user.')->group(function () {
    Route::namespace ('User')->group(function () {
        Route::get('blogs', 'HomeController@blogs')->name('blogs');
        Route::get('error-page', 'HomeController@errorPages')->name('error.page');
        Route::get('discount/product', 'HomeController@discountPro')->name('discount.product');
        Route::get('contact', 'HomeController@contact')->name('contact');
        Route::post('search', 'HomeController@search')->name('search');
        Route::get('blog/{slug}/{id}', 'HomeController@blogDetails')->name('blog.details');
        Route::post('paysera/payment', 'PayseraController@goPaysera');
        Route::get('paysera/accept', 'PayseraController@payseraAccept');
        Route::get('paysera/cancel', 'PayseraController@payseraCancel');
        Route::get('payseracallback', 'PayseraController@payseraCallback');
    });
});
Route::middleware('auth')->group(function () {
    Route::namespace ('User')->group(function () {
        Route::get('profile', 'ProfileController@profile')->name('profile');
        Route::get('back-to-profile', 'ProfileController@backToProfile')->name('profile.back');
        Route::get('view-order/{id}', 'ProfileController@viewOrder')->name('orders.view');
        Route::get('order/download/{id}', 'ProfileController@downloadOrder')->name('orders.download');
        Route::post('update-profile-info', 'ProfileController@updateInformation')->name('profile.update.info');
        Route::post('update-profile-billing', 'ProfileController@updateBilling')->name('profile.update.billing');
        Route::post('update-profile-password', 'ProfileController@updatePassword')->name('profile.update.password');
    });
});
// new

Route::post('get-price-by-filter', 'User\ListingController@getPriceByFilter')->name('filter.price.get');
Route::name('favorite.')->group(function () {
    Route::namespace ('User')->group(function () {
        Route::get('wishlist', 'CartController@wishlist')->name('show');
        Route::post('add-favorite', 'CartController@addFavorite')->name('add');
        Route::post('delete-favorite', 'CartController@deleteFavorite')->name('delete');
    });
});
Route::name('cart.')->group(function () {
    Route::namespace ('User')->group(function () {
        Route::get('cart', 'CartController@cart')->name('show');
        Route::post('add-cart', 'CartController@addCart')->name('add');
        Route::post('update-cart-item', 'CartController@updateCartItem')->name('item.update');
        Route::post('update-cart-item-by-id', 'CartController@updateCartItemById')->name('item.update.byid');
        Route::post('delete-cart/{id}', 'CartController@deleteCart')->name('delete');
        Route::get('checkout', 'CartController@checkout')->name('checkout');
        Route::post('filter-cart', 'CartController@filterCart')->name('filter');
        Route::post('cart-file-upload', 'CartController@UploadCartFile')->name('uploadFile');
    });
});
Route::group(['prefix' => 'admin'], function () {
    Route::name('admin.')->group(function () {
        Route::namespace ('Auth')->group(function () {
            Route::get('login', 'AdminLoginController@showLoginForm')->name('login');
            Route::post('login', 'AdminLoginController@login')->name('login.submit');
            Route::post('logout', 'AdminLoginController@logout')->name('logout');
        });
        Route::namespace ('Admin')->group(function () {

            Route::get('', 'DashboardController@index')->name('dashboard');
			
          	Route::get('change-password', 'DashboardController@changePassword')->name('changePassword');
            Route::post('change-password', 'DashboardController@passwordChange')->name('changePasswordForm');
          
            // users
            Route::get('users', 'UserController@users')->name('users');
            Route::post('delete-user', 'UserController@deleteUser')->name('deleteUser');
            Route::post('get-user', 'UserController@getUser')->name('getUser');
            Route::post('update-discount', 'UserController@updateDiscount')->name('updateDiscount');
            // vendors
            Route::get('login-as-vendor/{id}', 'VendorController@loginAsVendor')->name('loginAsVendor');
            Route::get('login-back-superadmin', 'VendorController@loginBackSuperAdmin')->name('loginBackSuperAdmin');
            Route::get('vendors', 'VendorController@vendors')->name('vendors');
            Route::post('insert-vendor', 'VendorController@insertVendor')->name('insertVendor');
            Route::post('get-vendor', 'VendorController@getVendor')->name('getVendor');
            Route::post('update-vendor', 'VendorController@updateVendor')->name('updateVendor');
            Route::post('delete-vendor', 'VendorController@deleteVendor')->name('deleteVendor');
            // admin shipping area

            // country
            Route::get('country', 'ShippingController@country')->name('country');
            Route::post('delete-country', 'ShippingController@deleteCountry')->name('deleteCountry');
            Route::post('get-country', 'ShippingController@getCountry')->name('getCountry');
            Route::post('update-country', 'ShippingController@updateCountry')->name('updateCountry');
            // shipping type
            Route::get('shipping-type', 'ShippingController@shippingType')->name('shippingType');
            Route::post('insert-shipping-type', 'ShippingController@insertShippingType')->name('insertShippingType');
            Route::post('delete-shipping-type', 'ShippingController@deleteShippingType')->name('deleteShippingType');
            Route::post('get-shipping-type', 'ShippingController@getShippingType')->name('getShippingType');
            Route::post('update-shipping-type', 'ShippingController@updateShippingType')->name('updateShippingType');
            // shipping category
            Route::get('shipping-category', 'ShippingController@shippingCategory')->name('shippingCategory');
            Route::post('insert-shipping-category', 'ShippingController@insertShippingCategory')->name('insertShippingCategory');
            Route::post('delete-shipping-category', 'ShippingController@deleteShippingCategory')->name('deleteShippingCategory');
            Route::post('get-shipping-category', 'ShippingController@getShippingCategory')->name('getShippingCategory');
            Route::post('update-shipping-category', 'ShippingController@updateShippingCategory')->name('updateShippingCategory');
            // shipping
            Route::get('shipping', 'ShippingController@shipping')->name('shipping');
            Route::post('insert-shipping', 'ShippingController@insertShipping')->name('insertShipping');
            Route::post('delete-shipping', 'ShippingController@deleteShipping')->name('deleteShipping');
            Route::post('get-shipping', 'ShippingController@getShipping')->name('getShipping');
            Route::post('update-shipping', 'ShippingController@updateShipping')->name('updateShipping');
            // shipping
            Route::get('shipping-setting', 'ShippingController@shippingSetting')->name('shippingSetting');
            Route::post('insert-shipping-setting', 'ShippingController@insertShippingSetting')->name('insertShippingSetting');

            // admin custom size area
            Route::get('custom-size', 'CustomSizeController@customSize')->name('customSize');
            Route::post('insert-custom-size', 'CustomSizeController@insertCustomSize')->name('insertCustomSize');
            Route::post('delete-custom-size', 'CustomSizeController@deleteCustomSize')->name('deleteCustomSize');
            Route::post('get-custom-size', 'CustomSizeController@getCustomSize')->name('getCustomSize');
            Route::post('update-custom-size', 'CustomSizeController@updateCustomSize')->name('updateCustomSize');
            Route::post('update-size-item', 'CustomSizeController@updateSizeItem')->name('updateSizeItem');
            Route::post('delete-size-item', 'CustomSizeController@deleteSizeItem')->name('deleteSizeItem');

            // admin custom color area
            Route::get('custom-color', 'CustomColorController@customColor')->name('customColor');
            Route::post('insert-custom-color', 'CustomColorController@insertCustomColor')->name('insertCustomColor');
            Route::post('delete-custom-color', 'CustomColorController@deleteCustomColor')->name('deleteCustomColor');
            Route::post('get-custom-color', 'CustomColorController@getCustomColor')->name('getCustomColor');
            Route::post('update-custom-color', 'CustomColorController@updateCustomColor')->name('updateCustomColor');
            Route::get('yarn-color', 'CustomColorController@yarnColor')->name('yarnColor');
            Route::post('insert-yarn-color', 'CustomColorController@insertYarnColor')->name('insertYarnColor');
            Route::post('delete-yarn-color', 'CustomColorController@deleteYarnColor')->name('deleteYarnColor');
            Route::post('get-yarn-color', 'CustomColorController@getYarnColor')->name('getYarnColor');
            Route::post('update-yarn-color', 'CustomColorController@updateYarnColor')->name('updateYarnColor');

            // admin specification area
            Route::get('specification', 'SpecificationController@specification')->name('specification');
            Route::post('insert-specification', 'SpecificationController@insertSpecification')->name('insertSpecification');
            Route::post('delete-specification', 'SpecificationController@deleteSpecification')->name('deleteSpecification');
            Route::post('get-specification', 'SpecificationController@getSpecification')->name('getSpecification');
            Route::post('update-specification', 'SpecificationController@updateSpecification')->name('updateSpecification');

            // admin custom clasp area
            Route::get('custom-clasp', 'CustomClaspController@customClasp')->name('customClasp');
            Route::post('insert-custom-clasp', 'CustomClaspController@insertCustomClasp')->name('insertCustomClasp');
            Route::post('delete-custom-clasp', 'CustomClaspController@deleteCustomClasp')->name('deleteCustomClasp');
            Route::post('get-custom-clasp', 'CustomClaspController@getCustomClasp')->name('getCustomClasp');
            Route::post('update-custom-clasp', 'CustomClaspController@updateCustomClasp')->name('updateCustomClasp');

            // admin custom surface of amber area
            Route::get('surface-of-amber', 'SurfaceOfAmberController@surfaceOfAmber')->name('surfaceOfAmber');
            Route::post('insert-surface-of-amber', 'SurfaceOfAmberController@insertSurfaceOfAmber')->name('insertSurfaceOfAmber');
            Route::post('delete-surface-of-amber', 'SurfaceOfAmberController@deleteSurfaceOfAmber')->name('deleteSurfaceOfAmber');
            Route::post('get-surface-of-amber', 'SurfaceOfAmberController@getSurfaceOfAmber')->name('getSurfaceOfAmber');
            Route::post('update-surface-of-amber', 'SurfaceOfAmberController@updateSurfaceOfAmber')->name('updateSurfaceOfAmber');

            // admin menu area
            Route::get('menu-list', 'MenuController@menuList')->name('menuList');
            Route::post('insert-menu', 'MenuController@insertMenu')->name('insertMenu');
            Route::post('delete-menu', 'MenuController@deleteMenu')->name('deleteMenu');
            Route::post('get-menu', 'MenuController@getMenu')->name('getMenu');
            Route::post('update-menu', 'MenuController@updateMenu')->name('updateMenu');
            Route::post('insert-menu-main-description', 'MenuController@insertMMDescription')->name('insertMMDescription');
            Route::post('get-custom-size-from-menu', 'MenuController@getCtmSizeFM')->name('getCtmSizeFM');

            // admin submenu area
            Route::get('sub-menu-list', 'MenuController@subMenuList')->name('subMenuList');
            Route::post('insert-sub-menu', 'MenuController@insertSubMenu')->name('insertSubMenu');
            Route::post('delete-sub-menu', 'MenuController@deleteSubMenu')->name('deleteSubMenu');
            Route::post('get-sub-menu', 'MenuController@getSubMenu')->name('getSubMenu');
            Route::post('update-sub-menu', 'MenuController@updateSubMenu')->name('updateSubMenu');
            Route::post('get-sub-menu-by-menu', 'MenuController@getSubMenuByMenu')->name('getSubMenuByMenu');
            Route::post('get-custom-size-from-sub-menu', 'MenuController@getCtmSizeFSM')->name('getCtmSizeFSM');

            // admin innermenu area
            Route::get('inner-menu-list', 'MenuController@innerMenuList')->name('innerMenuList');
            Route::post('insert-inner-menu', 'MenuController@insertInnerMenu')->name('insertInnerMenu');
            Route::post('delete-inner-menu', 'MenuController@deleteInnerMenu')->name('deleteInnerMenu');
            Route::post('get-inner-menu', 'MenuController@getInnerMenu')->name('getInnerMenu');
            Route::post('update-inner-menu', 'MenuController@updateInnerMenu')->name('updateInnerMenu');
            Route::post('get-inner-menu-by-menu', 'MenuController@getInnerMenuBySubMenu')->name('getInnerMenuBySubMenu');
            Route::post('get-custom-size-from-inner-menu', 'MenuController@getCtmSizeFIM')->name('getCtmSizeFIM');

            Route::post('get-color-size-append-content', 'CustomSizeController@getColorSizeAppendContent')->name('getColorSizeAppendContent');

            // admin product area
            Route::get('product-list', 'ProductController@productList')->name('productList');
            Route::post('alt-temp-pimg-up', 'ProductController@altTempPimgUp')->name('altTempPimgUp');
            Route::post('alt-temp-pimg-remove', 'ProductController@altTempPimgRemove')->name('altTempPimgRemove');
            Route::post('delete-alt-img-by-id', 'ProductController@deleteAltImgById')->name('deleteAltImgById');
            Route::post('insert-product', 'ProductController@insertProduct')->name('insertProduct');
            Route::post('delete-product', 'ProductController@deleteProduct')->name('deleteProduct');
            Route::post('get-product', 'ProductController@getProduct')->name('getProduct');
            Route::post('duplicate-product', 'ProductController@duplicateProduct')->name('duplicateProduct');
            Route::post('update-product', 'ProductController@updateProduct')->name('updateProduct');
            Route::post('update-product-price', 'ProductController@updateProductPrice')->name('updateProductPrice');
            Route::post('delete-product-price', 'ProductController@deleteProductPrice')->name('deleteProductPrice');
            Route::post('add-product-tmp-main-img', 'ProductController@addProductTmpMainImg')->name('addProductTmpMainImg');
            Route::post('remove-product-tmp-main-img', 'ProductController@removeProductTmpMainImg')->name('removeProductTmpMainImg');
            Route::post('update-product-tmp-main-img', 'ProductController@updateProductTmpMainImg')->name('updateProductTmpMainImg');
            Route::post('update-product-size-single', 'ProductController@updateProductSizeSingle')->name('updateProductSizeSingle');
            Route::post('delete-product-size-single', 'ProductController@deleteProductSizeSingle')->name('deleteProductSizeSingle');

            //rasel

            Route::get('payment-history', 'PaymentHistoryController@index')->name('payment.history');
            Route::post('payment-history', 'PaymentHistoryController@orderDetails')->name('payment.history.details');
            Route::post('payment-is-paid', 'PaymentHistoryController@isPaid')->name('payment.history.is_paid');
            Route::post('payment-shipping-status', 'PaymentHistoryController@shippingStatus')->name('payment.history.shipping_status');

            // admin main slider area
            Route::get('main-slider', 'SliderController@mainSlider')->name('mainSlider');
            Route::post('insert-main-slider', 'SliderController@insertMainSlider')->name('insertMainSlider');
            Route::post('get-main-slider', 'SliderController@getMainSlider')->name('getMainSlider');
            Route::post('update-main-slider', 'SliderController@updateMainSlider')->name('updateMainSlider');
            Route::post('delete-main-slider', 'SliderController@deleteMainSlider')->name('deleteMainSlider');

            // admin main certificate
            Route::get('certificate', 'CertificateController@certificate')->name('certificate');
            // Route::post('insert-certificate', 'CertificateController@insertCertificate')->name('insertCertificate');
            // Route::post('get-certificate', 'CertificateController@getCertificate')->name('getCertificate');
            Route::post('update-certificate', 'CertificateController@updateCertificate')->name('updateCertificate');
            // Route::post('delete-certificate', 'CertificateController@deleteCertificate')->name('deleteCertificate');

            // admin package area
            Route::get('package', 'PackageController@package')->name('package');
            Route::post('insert-packages', 'PackageController@insertPackage')->name('insertPackage');
            Route::post('get-packages', 'PackageController@getPackage')->name('getPackage');
            Route::post('update-packages', 'PackageController@updatePackage')->name('updatePackage');
            Route::post('delete-packages', 'PackageController@deletePackage')->name('deletePackage');

            // admin pages area
            Route::get('page', 'PageController@page')->name('page');
            Route::post('insert-page', 'PageController@insertPage')->name('insertPage');
            Route::post('delete-page', 'PageController@deletePage')->name('deletePage');
            Route::post('get-page', 'PageController@getPage')->name('getPage');
            Route::post('update-page', 'PageController@updatePage')->name('updatePage');

            // admin blog area
            Route::get('blog', 'BlogController@blog')->name('blog');
            Route::post('insert-blog', 'BlogController@insertBlog')->name('insertBlog');
            Route::post('delete-blog', 'BlogController@deleteBlog')->name('deleteBlog');
            Route::post('get-blog', 'BlogController@getBlog')->name('getBlog');
            Route::post('update-blog', 'BlogController@updateBlog')->name('updateBlog');
            // admin api area
            Route::get('api', 'ApiController@api')->name('api.show');
            Route::post('insert-api', 'ApiController@insertApi')->name('insertApi');
            Route::post('delete-api', 'ApiController@deleteApi')->name('deleteApi');
            Route::post('get-api', 'ApiController@getApi')->name('getApi');
            Route::post('update-api', 'ApiController@updateApi')->name('updateApi');
            Route::get('insert-product-api', 'ApiController@insertProductApi')->name('api.product.insert');
            // admin settings area
            Route::get('settings', 'SettingController@settings')->name('settings');
            Route::post('insert-settings', 'SettingController@insertSetting')->name('insertSetting');
            // admin omniva area
            Route::get('omniva', 'OmnivaController@omniva')->name('omniva');
        });
    });
});

// Route::get('{path}', 'RouteController@path')->where('path', '([\s\S]+)?');

// Auth::routes();

// Route::get('/home', 'HomeController@index');
Auth::routes();
Route::get('{slug}/{slug1?}/{slug2?}/{slug3?}', 'User\RouteController@slugUrl')->name('user.slugUrl');
Route::get('{path}', 'User\RouteController@path')->where('path', '([\s\S]+)?');
