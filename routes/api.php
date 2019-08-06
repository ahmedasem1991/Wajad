<?php

use Illuminate\Http\Request;

# Auth Routes
Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');
# Categories 
Route::get('/categories', 'CategoriesController@index');

# Items
Route::get('/items', 'ItemsController@index');


# Authenticated Routes
Route::group(['middleware' => ['auth:api']], function(){
});