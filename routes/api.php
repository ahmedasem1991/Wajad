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
Route::get('/getallposts', 'PostsController@index');

# Items
Route::get('/items', 'ItemsController@index');

# Support
Route::post('/contact-us', 'SupportController@store');
# Qr Code 
Route::get('/scan-qr-code/{qr_code?}', 'QrcodeController')->name('scan-qrcode-api');



Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function (Request $request) {
        return auth('api')->user();
    });
    Route::post('details', 'DetailsController@index');
    Route::post('/userposts/{publisher_id}', 'PostsController@userposts');
    Route::post('/addpost', 'PostsController@store');
});
