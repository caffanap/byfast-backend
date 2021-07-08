<?php

use App\Http\Controllers\Admin\PacketController;
use App\Http\Controllers\Admin\ToppingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard', function () {
    return View::make('admin.template');
})->name('dashboard');

Route::resource('packets', PacketController::class);

Route::resource('toppings', ToppingController::class);