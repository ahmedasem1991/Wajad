<?php

# Auth Routes
Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');
Route::post('/refresh-token', 'Auth\AuthController@refresh');
Route::post('/verify', 'Auth\AuthController@verify');
Route::post('/resendCode', 'Auth\AuthController@resendCode');

# Categories
Route::get('/categories', 'CategoryController@index');

# Sub Categories
Route::get('/subcategories', 'CategoryController@subcategories');

# Brands
Route::get('/brands', 'CategoryController@brands');

# Models
Route::get('/models', 'CategoryController@models');

# Colors
Route::get('/colors', 'CategoryController@colors');

# Wajad Offices
Route::get('/offices', 'OfficeController@index');

# Maps
Route::get('/maps/{type?}', 'MapController');

# Sliders
Route::get('/sliders', 'SlidersController@index');

# Posts
Route::get('/posts', 'PostsController@index');

# Post types
Route::get('/post-types', 'PostsController@postTypes');

# Items
Route::get('/items', 'ItemsController@index');

# Countries
Route::get('/countries', 'LocationsController@index');

# Regions
Route::get('/regions', 'LocationsController@regions');

# Support
Route::post('/contact-us', 'SupportController@store');

# Qr Code
Route::get('/scan-qr-code/{qr_code?}', 'QrcodeController')->name('scan-qrcode-api');

# Pages
Route::get('/pages/{page?}', 'PageController');

Route::group(['middleware' => ['auth:api']], function () {
    Route::put('change-password', 'Auth\ChangePasswordController');


    Route::get('/user', function (Request $request) {
        return auth('api')->user();
    });
    Route::post('details', 'DetailsController@index');

    Route::get('/user/{publisher_id}/posts', 'PostsController@userPosts');
    Route::get('/user/{user_id}/qrcodes', 'QrcodeController@userQrcodes');

    Route::post('/posts/create', 'PostsController@store');
    Route::post('/posts/report', 'PostsController@reportPost');
    
    Route::post('/items/create', 'ItemsController@store');
   
    Route::post('/qrcodes/create', 'GenerateAndAssignQRCodeController@store');
    Route::post('/qrcodes/register/', 'QrcodeController@registerQrcodes');

});
