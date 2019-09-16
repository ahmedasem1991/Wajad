<?php

use Illuminate\Support\Facades\Route;

Route::get('/balance', 'Sms\Sendsms\Http\Controllers\BalanceController@show');
Route::get('/model/{model_id}', 'Sms\Sendsms\Http\Controllers\ModelController@show');
Route::post('/send-sms', 'Sms\Sendsms\Http\Controllers\SendSMSController@store');

