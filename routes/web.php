<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
// Route::get('/', 'HomeController@index');

// common route===
Route::get('', 'SiteController@index');
Route::get('shop', 'SiteController@shop');
Route::get('shop/{name}/{id}', 'SiteController@categoryPage');
Route::get('subcat/{name}/{id}', 'SiteController@subcatPage');
Route::get('brand/{name}/{id}', 'SiteController@brandPage');
Route::post('subscriber', 'SiteController@subscriber');
Route::get('ProductView/{product_slug}', 'ProductController@ProductView');
Route::get('product/search', 'ProductController@searchProduct');

// WishList Route here=====
Route::post('/wishlist/{id}','author\WishlistController@addWishList');
Route::get('wishlist','author\WishlistController@wishlist')->name('wishlist');
Route::post('wishlist_remove/{pid}','author\WishlistController@wishlist_remove');

// Add to cart Route here=====
Route::post('add_cart/{id}','CartController@addCart');
Route::post('cart_remove/{id}','CartController@remove');
Route::get('cart','CartController@cartView');
Route::get('check_out','CartController@checkOut')->name('check_out');
Route::post('update_cart','CartController@cartUpdate');
Route::post('coupon_code','CartController@coupon_code');

// payment==================
Route::post('payment_process','PaymentController@payment_process')->name('payment_process');
Route::post('payment_process/stripe','PaymentController@stripeCharge')->name('stripe.charge');

// Google Login 
Route::get('/google-login', 'GoogleAuthController@redirectToProvider');
Route::get('/callback', 'GoogleAuthController@handleProviderCallback');



// admin route============
Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']], function () {
    Route::get('','DashboardController@index')->name('dashboard');

    // Password Change Route===
    Route::get('password_change','ChangePassword@ChangePassword')->name('password_change');
    Route::post('password_update','ChangePassword@UpdatePassword')->name('password_update');

    // Category Route===
    Route::resource('category', 'category\CategoryController'); 
    Route::get('category/{id}/destroy', 'category\CategoryController@destroy'); 

    // Subcategory Route===
    Route::resource('subcategory', 'category\SubcategoryController'); 
    Route::get('subcategory/{id}/destroy', 'category\SubcategoryController@destroy');

    // Brand Route=== 
    Route::resource('brand', 'category\BrandController'); 
    Route::get('brand/{id}/destroy', 'category\BrandController@destroy');

    // Coupon Route=== 
    Route::resource('coupon', 'category\CouponController'); 
    Route::get('coupon/{id}/destroy', 'category\CouponController@destroy'); 

    // Subscriber Route=== 
    Route::resource('subscriber', 'other\SubscriberController'); 
    Route::get('subscriber/{id}/destroy', 'other\SubscriberController@destroy'); 
    // Seo Route=== 
    Route::get('seo', 'other\SubscriberController@seoSetting'); 
    Route::post('update/seo', 'other\SubscriberController@seoSettingUpdate'); 
    Route::get('site/setting', 'other\SubscriberController@siteSetting'); 
    Route::post('update/site/setting', 'other\SubscriberController@siteSettingUpdate'); 

    // Product Route=== 
    Route::resource('product', 'product\ProductController'); 
    Route::post('select_subcategory', 'product\ProductController@select_subcategory'); 
    Route::post('unique_name', 'product\ProductController@unique_name'); 
    Route::post('unique_name_edit', 'product\ProductController@unique_name_edit'); 
    Route::get('product/{id}/destroy', 'product\ProductController@destroy'); 
    Route::get('product/{id}/active', 'product\ProductController@active'); 
    Route::get('product/{id}/unactive', 'product\ProductController@unactive'); 

    // order Route===
    Route::get('order/pending', 'order\OrderController@ordernew')->name('neworder'); 
    Route::get('order/view/{id}', 'order\OrderController@vieworder'); 
    Route::get('payment/accept/', 'order\OrderController@paymentAccept'); 
    Route::get('payment/accept/{id}', 'order\OrderController@acceptPayment'); 
    Route::get('delevery/progress', 'order\OrderController@progressDelevery'); 
    Route::get('delevery/progress/{id}', 'order\OrderController@progressDeleveryUpdate'); 
    Route::get('delevery/success', 'order\OrderController@successDelevery'); 
    Route::get('delevery/success/{id}', 'order\OrderController@successDeleveryUpdate'); 
    Route::get('payment/cancel/{id}', 'order\OrderController@paymentCancel'); 
    Route::get('order/cancel/', 'order\OrderController@cancelOrder'); 

    // Report Route=====
    Route::get('report/daily/', 'report\ReportController@todayReport'); 
    Route::get('report/delivered/', 'report\ReportController@todayDelivered'); 
    Route::get('report/view/{id}/', 'report\ReportController@dailyReportView'); 
    Route::get('report/product/stock', 'report\ReportController@stockProduct'); 

});

// author route==========
Route::group(['as'=>'author.','prefix' => 'author','namespace'=>'Author', 'middleware'=>['auth','author']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/order/view/{id}','DashboardController@orderView');
    Route::get('/edit_profile/{id}','DashboardController@edit_profile');
    Route::post('/profile_update/{id}','DashboardController@profile_update');
    // Route::get('/wishlist','WishlistController@addWishList')->name('addWishList');

    
    // Password Change Route===
    Route::get('password_change','DashboardController@ChangePassword')->name('password_change');
    Route::post('password_update','DashboardController@UpdatePassword')->name('password_update');

});
