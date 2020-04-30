<?php


Route::get('/','PagesController@home');
Route::get('category/{cat_name}','PagesController@showCat');
Route::get('product/{products_id}','PagesController@showProduct');


Route::prefix('user')->group(function () {
    Route::get("login","UserController@ShowLoginForm");
    Route::get("signup","UserController@ShowSignUpForm");
    Route::get("logout","UserController@LogOut");
    Route::post("login","UserController@ValidateUesr");
    Route::post("signup","UserController@SignUpUser");

});


Route::prefix('shop')->group(function () {
    Route::get("AddToCart","shopController@addToCart");
    Route::get("UpdateCart","shopController@UpdateCart");
    Route::get("DeleteProduct","shopController@DeleteProduct");
    Route::get("GoToCart","shopController@ShowCart");
    Route::get("save_order","shopController@SaveOrder");


});

Route::group(['middleware' => ['CmsDashBoard']], function () {
    Route::prefix('cms')->group(function () {
        Route::get("dashboard","PagesController@ShowDashboard");
        Route::resource('categories','CmsCategories');
        Route::resource('products','CmsProducts');
        Route::resource('publishes','CmsPublishes');
        Route::resource('orders','CmsOrders');

    });
});

Route::resource('pay','pay');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

