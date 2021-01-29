<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// frontend
Route::get('/login', [
    'as' => 'home.getlogin',
    'uses' => 'HomeController@getLogin'
]);
Route::post('/login', [
    'as' => 'home.postlogin',
    'uses' => 'HomeController@postLogin'
]);
Route::get('/register', [
    'as' => 'home.register_view',
    'uses' => 'HomeController@register_view'
]);
Route::post('/register', [
    'as' => 'home.register',
    'uses' => 'HomeController@register'
]);
Route::get('/logout', [
    'as' => 'home.logout',
    'uses' => 'HomeController@logout'
]);

//Route::middleware('auth')->group(function (){
    // Trang chủ
    Route::get('/', [
        'as' => 'home.index',
        'uses' => 'HomeController@index'
    ]);

    // Profile
    Route::prefix('/my-account')->group(function () {
        Route::get('/profile', [
            'as' => 'home.profile',
            'uses' => 'MyAccountController@profile'
        ]);
        Route::post('/profile/{id}', [
            'as' => 'home.profile-edit',
            'uses' => 'MyAccountController@profileEdit'
        ]);

        Route::get('/lich-su-don-hang-chi-tiet/{id}', [
            'as' => 'home.order_history',
            'uses' => 'MyAccountController@order_history'
        ]);
    });


    // Thanh toán
    Route::get('/checkout', [
        'as' => 'checkout.index',
        'uses' => 'HomeCheckoutController@index'
    ]);
    Route::post('/checkout', [
        'as' => 'checkout.post',
        'uses' => 'HomeCheckoutController@post'
    ]);
    // Gior hangf
    Route::prefix('shopping-cart')->group(function () {
        Route::get('/', [
            'as' => 'shopping-cart.index',
            'uses' => 'HomeCartShoppingController@index'
        ]);
        Route::post('/add/{id}', [
            'as' => 'shopping-cart.add',
            'uses' => 'HomeCartShoppingController@store'
        ]);
        Route::post('/update/{id}', [
            'as' => 'shopping-cart.update',
            'uses' => 'HomeCartShoppingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'shopping-cart.destroy',
            'uses' => 'HomeCartShoppingController@destroy'
        ]);
        Route::get('/delete-all', [
            'as' => 'shopping-cart.deleteAll',
            'uses' => 'HomeCartShoppingController@deleteAll'
        ]);
    });

    // Tìm kiếm
    Route::get('/search', [
        'as' => 'search',
        'uses' => 'HomeController@search'
    ]);

    // Sản phẩm
    Route::get('danh-muc/cate1={category_slug1}/cate2={category_slug2}/cate3={category_slug3}/id={category_id}', [
        'as' => 'home.product_list',
        'uses' => 'HomeCategoryController@product_list'
    ]);
    Route::prefix('san-pham')->group(function () {
        Route::get('/{id}/{slug}', [
            'as' => 'home.product_detail',
            'uses' => 'HomeProductController@product_detail'
        ]);
    });
//});
