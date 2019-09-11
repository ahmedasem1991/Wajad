<?php

use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

# Auth Routes
Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');
Route::post('/refresh-token', 'Auth\AuthController@refresh');

# Categories 
Route::get('/categories', 'CategoryController@index');

# On Boarding Sliders
Route::get('/onboarding', 'OnboardingController@index');

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
    Route::get('/user/{publisher_id}/posts', 'PostsController@userposts');
    Route::post('/posts/create', 'PostsController@store');
    Route::post('/items/create', 'ItemsController@store');
});
