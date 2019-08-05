<?php

use Illuminate\Http\Request;

# Auth Routes
Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');

# Sliders Starts

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function (Request $request) {
        return auth('api')->user();
    });
    Route::get('/', function () {
        return 'test';
    });
    Route::post('details', 'DetailsController@index');
});
