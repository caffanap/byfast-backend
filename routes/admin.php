<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CreditController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PacketController;
use App\Http\Controllers\Admin\ToppingController;
use App\Http\Controllers\Admin\PacketCategoryController;
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

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('packets', PacketController::class);

Route::resource('toppings', ToppingController::class);

Route::resource('banners', BannerController::class)->only(['index', 'edit', 'update']);

Route::resource('packet-categories', PacketCategoryController::class);

Route::resource('credits', CreditController::class)->only(['index', 'create', 'store']);