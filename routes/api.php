<?php

use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/getQr/{id}', function (Request $request,$id) {
    $QRCode=App\Qrcodes::with('user')->with('item')->find($id);
   
    return response()->json([$QRCode]);
});