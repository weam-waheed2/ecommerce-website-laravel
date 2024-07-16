<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\DailyGiftsController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

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

Route::match(['post', 'get'],'/', [AuthController::class, 'login'])->name('login');
Route::match(['post', 'get'],'/register', [AuthController::class, 'register'])->name('register');
Route::match(['post', 'get'],'/logout', [AuthController::class,'logout'])->name('logout');

Route::prefix('home')->middleware(['auth'])->group(function(){
    Route::match(['post', 'get'], '/', [DashboardController::class, 'Index'])->name('home');    
    Route::match(['post', 'get'], '/users', [UsersController::class, 'List'])->name('users'); 
    Route::match(['post', 'get'], '/offers', [OffersController::class, 'List'])->name('offers'); 
    Route::match(['post', 'get'], '/daily_gifts', [DailyGiftsController::class, 'List'])->name('daily_gifts'); 
    Route::match(['post', 'get'], '/balance', [BalanceController::class, 'List'])->name('balance'); 
    Route::match(['post', 'get'], '/reports', [ReportsController::class, 'List'])->name('reports'); 
    Route::match(['post', 'get'], '/settings', [SettingsController::class, 'List'])->name('settings'); 
       
});

