<?php

# Auth Routes
Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');
Route::post('/refresh-token', 'Auth\AuthController@refresh');
Route::post('/verify', 'Auth\AuthController@verify');
Route::post('/resendCode', 'Auth\AuthController@resendCode');
Route::post('/resetPassword', 'Auth\AuthController@resetPassword');
Route::get('/send/email', 'HomeController@mail');
Route::post('/logout', 'Auth\AuthController@logout');

# Categories
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{category}', 'CategoryController@show');

# Sub Categories
Route::get('/subCategories/{type?}', 'SubCategoryController@index');
Route::get('/subCategories/{subCategory}', 'SubCategoryController@show');

# Brands
Route::get('/brands/{subcategory_id?}', 'BrandController@index');
Route::get('/brands/{brand}', 'BrandController@show');

# Models
Route::get('/models/{brand_id?}', 'ModelController@index');
Route::get('/models/{model}', 'ModelController@show');

# Colors
Route::get('/colors', 'ColorController@index');
Route::get('/colors/{color}', 'ColorController@show');

# Wajad Offices
Route::get('/offices', 'OfficeController@index');

# Maps
Route::get('/maps/{type?}', 'MapController');

# Banners
Route::get('/banners', 'BannerController');

# Posts
Route::get('/posts', 'PostsController@index');

# Post types
Route::get('/post-types', 'PostsController@postTypes');

# Items
Route::get('/items', 'ItemsController@index');

# Countries
Route::get('/countries', 'LocationsController@index');

# Regions
Route::get('/regions', 'RegionController@index');

# Support
Route::post('/contact-us', 'SupportController@store');

# Qr Code
Route::get('/scan-qr-code/{qr_code?}', 'QrcodeController')->name('scan-qrcode-api');

# Pages
// Route::get('/pages/{page?}', 'PageController');

Route::group(['middleware' => ['auth:api']], function () {
    Route::put('change-password', 'Auth\ChangePasswordController');
    Route::post('/changePassword', 'Auth\AuthController@changePassword');


    Route::get('/user', function (Request $request) {
        return auth('api')->user();
    });
    Route::post('details', 'DetailsController@index');

    Route::get('/user/{publisher_id}/posts', 'PostsController@userPosts');
    Route::get('/user/{user_id}/qrcodes', 'QrcodeController@userQrcodes');

    Route::post('/posts/create', 'PostsController@store');
    Route::post('/posts/report', 'PostsController@reportPost');
    Route::get('/posts/search', 'PostsController@search');

    Route::post('/items/create', 'ItemsController@store');
   
    Route::post('/qrcodes/create', 'GenerateAndAssignQRCodeController@store');
    Route::post('/qrcodes/register/', 'QrcodeController@registerQrcodes');

});
