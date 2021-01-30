<?php
//Login
Route::get('auth/login', [
    'as' => 'admin.login',
    'uses' => 'AdminController@loginAdmin'
]);
Route::post('auth/login', [
    'as' => 'admin.postLogin',
    'uses' => 'AdminController@postloginAdmin'
]);
Route::get('auth/logout', [
    'as' => 'admin.logout',
    'uses' => 'AdminController@logoutAdmin'
]);

Route::middleware('adminCheck:admin-web')->group(function (){
//// Quản lý admin
    Route::prefix('admin')->group(function () {
        Route::get('/', [
            'as' => 'admin.index',
            'uses' => 'AdminController@index'
        ]);

        Route::prefix('categories')->group(function () {
            Route::get('/', [
                'as'=>'categories.index',
                'uses'=>'CategoryController@index',
                'middleware'=>'can:list-category'
            ]);
            Route::get('/add', [
                'as'=>'categories.add',
                'uses'=>'CategoryController@add',
                'middleware'=>'can:add-category'
            ]);
            Route::post('/store', [
                'as'=>'categories.store',
                'uses'=>'CategoryController@store'
            ]);
            Route::get('/edit/{id}', [
                'as'=>'categories.edit',
                'uses'=>'CategoryController@edit',
                'middleware'=>'can:edit-category'
            ]);
            Route::post('/update/{id}', [
                'as'=>'categories.update',
                'uses'=>'CategoryController@update'
            ]);
            Route::get('/delete/{id}', [
                'as'=>'categories.delete',
                'uses'=>'CategoryController@delete',
                'middleware'=>'can:delete-category'
            ]);
        });
        Route::prefix('menus')->group(function () {
            Route::get('/', [
                'as'=>'menus.index',
                'uses'=>'MenusController@index',
                'middleware'=>'can:list-menu'
            ]);
            Route::get('/add', [
                'as'=>'menus.add',
                'uses'=>'MenusController@add',
                'middleware'=>'can:add-menu'
            ]);
            Route::post('/store', [
                'as'=>'menus.store',
                'uses'=>'MenusController@store'
            ]);
            Route::get('/edit/{id}', [
                'as'=>'menus.edit',
                'uses'=>'MenusController@edit',
                'middleware'=>'can:edit-menu'
            ]);
            Route::post('/update/{id}', [
                'as'=>'menus.update',
                'uses'=>'MenusController@update'
            ]);
            Route::get('/delete/{id}', [
                'as'=>'menus.delete',
                'uses'=>'MenusController@delete',
                'middleware'=>'can:delete-menu'
            ]);
        });
        Route::prefix('product')->group(function () {
            Route::get('/', [
                'as'=>'product.index',
                'uses'=>'AdminProductController@index',
                'middleware'=>'can:list-product'
            ]);
            Route::get('/add', [
                'as'=>'product.add',
                'uses'=>'AdminProductController@add',
                'middleware'=>'can:add-product'
            ]);Route::post('/store', [
                'as'=>'product.store',
                'uses'=>'AdminProductController@store'
            ]);
            Route::get('/edit/{id}', [
                'as'=>'product.edit',
                'uses'=>'AdminProductController@edit',
                'middleware'=>'can:edit-product,id'
            ]);
            Route::post('/update/{id}', [
                'as'=>'product.update',
                'uses'=>'AdminProductController@update'
            ]);
            Route::get('/delete/{id}', [
                'as'=>'product.delete',
                'uses'=>'AdminProductController@delete',
                'middleware'=>'can:delete-product'
            ]);
            Route::get('/onstatus/{id}', [
                'as'=>'product.onstatus',
                'uses'=>'AdminProductController@onstatus'
//            'middleware'=>'can:delete-product'
            ]);
            Route::get('/offstatus/{id}', [
                'as'=>'product.offstatus',
                'uses'=>'AdminProductController@offstatus'
//            'middleware'=>'can:delete-product'
            ]);
            Route::get('/on_pro_hot/{id}', [
                'as'=>'product.on_pro_hot',
                'uses'=>'AdminProductController@on_pro_hot'
//            'middleware'=>'can:delete-product'
            ]);
            Route::get('/off_pro_hot/{id}', [
                'as'=>'product.off_pro_hot',
                'uses'=>'AdminProductController@off_pro_hot'
//            'middleware'=>'can:delete-product'
            ]);
        });
        Route::prefix('slider')->group(function () {
            Route::get('/', [
                'as'=>'slider.index',
                'uses'=>'AdminSliderController@index',
                'middleware'=>'can:list-slider'
            ]);
            Route::get('/add', [
                'as'=>'slider.add',
                'uses'=>'AdminSliderController@add',
                'middleware'=>'can:add-slider'
            ]);Route::post('/store', [
                'as'=>'slider.store',
                'uses'=>'AdminSliderController@store'
            ]);
            Route::get('/edit/{id}', [
                'as'=>'slider.edit',
                'uses'=>'AdminSliderController@edit',
                'middleware'=>'can:edit-slider'
            ]);
            Route::post('/update/{id}', [
                'as'=>'slider.update',
                'uses'=>'AdminSliderController@update'
            ]);
            Route::get('/delete/{id}', [
                'as'=>'slider.delete',
                'uses'=>'AdminSliderController@delete',
                'middleware'=>'can:delete-slider'
            ]);
        });
        Route::prefix('setting')->group(function () {
            Route::get('/', [
                'as'=>'setting.index',
                'uses'=>'AdminSettingController@index',
                'middleware'=>'can:list-setting'
            ]);
            Route::get('/add', [
                'as'=>'setting.add',
                'uses'=>'AdminSettingController@add',
                'middleware'=>'can:add-setting'
            ]);Route::post('/store', [
                'as'=>'setting.store',
                'uses'=>'AdminSettingController@store'
            ]);
            Route::get('/edit/{id}', [
                'as'=>'setting.edit',
                'uses'=>'AdminSettingController@edit',
                'middleware'=>'can:edit-setting'
            ]);
            Route::post('/update/{id}', [
                'as'=>'setting.update',
                'uses'=>'AdminSettingController@update'
            ]);
            Route::get('/delete/{id}', [
                'as'=>'setting.delete',
                'uses'=>'AdminSettingController@delete',
                'middleware'=>'can:delete-setting'
            ]);
        });
        Route::prefix('users')->group(function () {
            Route::get('/', [
                'as' => 'users.index',
                'uses' => 'AdminUserController@index',
                'middleware'=>'can:list-users'
            ]);
            Route::get('/add', [
                'as' => 'users.add',
                'uses' => 'AdminUserController@add',
                'middleware'=>'can:add-users'
            ]);
            Route::post('/store', [
                'as' => 'users.store',
                'uses' => 'AdminUserController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'users.edit',
                'uses' => 'AdminUserController@edit',
                'middleware'=>'can:edit-users'
            ]);

            Route::post('/update/{id}', [
                'as' => 'users.update',
                'uses' => 'AdminUserController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'users.delete',
                'uses' => 'AdminUserController@delete',
                'middleware'=>'can:delete-users'
            ]);
            Route::get('/profile', [
                'as' => 'users.profile',
                'uses' => 'AdminUserController@profile',
    //                'middleware'=>'can:list-permission'
            ]);

        });
        Route::prefix('user-guest')->group(function () {
            Route::get('/', [
                'as' => 'user_guest.index',
                'uses' => 'AdminUserGuestController@index',
//                'middleware'=>'can:list-users'
            ]);
            Route::get('/lock/{id}', [
                'as' => 'user_guest.lock',
                'uses' => 'AdminUserGuestController@lock',
//                'middleware'=>'can:add-users'
            ]);
            Route::get('/unlock/{id}', [
                'as' => 'user_guest.unlock',
                'uses' => 'AdminUserGuestController@unlock',
//                'middleware'=>'can:add-users'
            ]);
//            Route::post('/store', [
//                'as' => 'user_guest.store',
//                'uses' => 'AdminUserGuestController@store'
//            ]);
//
//            Route::get('/edit/{id}', [
//                'as' => 'user_guest.edit',
//                'uses' => 'AdminUserGuestController@edit',
////                'middleware'=>'can:edit-users'
//            ]);
//
//            Route::post('/update/{id}', [
//                'as' => 'user_guest.update',
//                'uses' => 'AdminUserGuestController@update'
//            ]);
            Route::get('/delete/{id}', [
                'as' => 'user_guest.delete',
                'uses' => 'AdminUserGuestController@delete',
//                'middleware'=>'can:delete-users'
            ]);

        });
        Route::prefix('roles')->group(function () {
            Route::get('/', [
                'as' => 'roles.index',
                'uses' => 'AdminRoleController@index',
                'middleware'=>'can:list-roles'
            ]);
            Route::get('/add', [
                'as' => 'roles.add',
                'uses' => 'AdminRoleController@add',
                'middleware'=>'can:add-roles'
            ]);
            Route::post('/store', [
                'as' => 'roles.store',
                'uses' => 'AdminRoleController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'roles.edit',
                'uses' => 'AdminRoleController@edit',
                'middleware'=>'can:edit-roles'
            ]);

            Route::post('/update/{id}', [
                'as' => 'roles.update',
                'uses' => 'AdminRoleController@update'
            ]);

            Route::get('/delete/{id}', [
                'as' => 'roles.delete',
                'uses' => 'AdminRoleController@delete',
                'middleware'=>'can:delete-roles'
            ]);

        });
        Route::prefix('permissions')->group(function () {
            Route::get('/', [
                'as' => 'permission.index',
                'uses' => 'AdminPermissionController@index',
                'middleware'=>'can:list-permission'
            ]);
            Route::get('/add', [
                'as' => 'permission.add',
                'uses' => 'AdminPermissionController@addPermissions',
                'middleware'=>'can:add-permission'
            ]);

            Route::post('/store', [
                'as' => 'permission.store',
                'uses' => 'AdminPermissionController@store'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'permission.delete',
                'uses' => 'AdminPermissionController@delete',
                'middleware'=>'can:delete-permission'
            ]);

        });

        //Đơn hàng
        Route::prefix('order')->group(function () {
            Route::get('/', [
                'as' => 'order.index',
                'uses' => 'AdminOrderController@index',
//                'middleware'=>'can:list-permission'
            ]);
            Route::get('/check_order/{id}', [
                'as' => 'order.check_order',
                'uses' => 'AdminOrderController@check_order',
//                'middleware'=>'can:add-permission'
            ]);

            Route::get('/view/{id}', [
                'as' => 'order.view',
                'uses' => 'AdminOrderController@view',
//                'middleware'=>'can:list-permission'
            ]);

            Route::get('/delete/{id}', [
                'as' => 'order.delete',
                'uses' => 'AdminOrderController@delete',
//                'middleware'=>'can:delete-permission'
            ]);

        });
        //Thống kê
        Route::prefix('thong-ke')->group(function () {
            Route::get('/day', [
                'as' => 'thongke.day',
                'uses' => 'AdminThongKeController@day',
//                'middleware'=>'can:list-permission'
            ]);
            Route::get('/month', [
                'as' => 'thongke.month',
                'uses' => 'AdminThongKeController@month',
//                'middleware'=>'can:list-permission'
            ]);
            Route::get('/year', [
                'as' => 'thongke.year',
                'uses' => 'AdminThongKeController@year',
//                'middleware'=>'can:list-permission'
            ]);
        });

        //Đánh giá
        Route::prefix('review')->group(function () {
            Route::get('/', [
                'as' => 'review.index',
                'uses' => 'AdminReviewController@index',
//                'middleware'=>'can:list-permission'
            ]);
            Route::get('/reply/{id}', [
                'as' => 'review.reply',
                'uses' => 'AdminReviewController@reply',
//                'middleware'=>'can:list-permission'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'review.delete',
                'uses' => 'AdminReviewController@delete',
//                'middleware'=>'can:delete-permission'
            ]);
        });



    });
});

//});


