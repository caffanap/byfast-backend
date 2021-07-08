<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});

Route::group(['middleware' => 'api'], function () {
    // Home
    Route::get('paket', 'MobileController@packets');
    Route::get('pulsa/{user}', 'MobileController@credit');
    Route::get('paket-saya/ringkasan/{user}', 'MobileController@userPacketSummary');
    Route::get('banner', 'MobileController@banner');

    // Paket Saya
    Route::get('paket-saya/detail/{user}', 'MobileController@userPacketDetail');

    // Detail Paket
    Route::get('paket/{packet}', 'MobileController@packet');
    Route::get('topping', 'MobileController@toppings');
    Route::get('poin-saya/{user}', 'MobileController@points');
    Route::post('transaksi-baru/{user}', 'MobileController@buyPacket');
});
