<?php

use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

# Auth Routes
Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/getQr/{id}', function (Request $request,$id) {
    $QRCode=App\Qrcodes::with('user')->with('item')->find($id);
   
    return response()->json([$QRCode]);
    return $id;
});
# Sliders Starts

Route::group(['middleware' => 'auth:api'], function () {
Route::group(['middleware' => ['auth:api']], function(){
    # Categories 
    Route::get('/categories', 'CategoriesController@index');
    
});
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function (Request $request) {
        return auth('api')->user();
    });
    Route::get('/', function () {
        return 'test';
    });
    Route::post('details', 'DetailsController@index');
    Route::get('categories', 'CategoriesController@index');
});
