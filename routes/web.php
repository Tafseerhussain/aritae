<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PlayerController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => 'player'], function () {
//     Route::get('admin', 'adminController@adminDashboard');
// });

Route::group(['middleware' => 'coach'], function () {
    Route::get('/coach/dashboard', [CoachController::class, 'index'])->name('coach.dashboard');
    Route::get('/coach/profile', [CoachController::class, 'profile'])->name('coach.profile');
});

Route::group(['middleware' => 'player'], function () {
    Route::get('/player/dashboard', [PlayerController::class, 'index'])->name('player.dashboard');
    Route::get('/player/profile', [PlayerController::class, 'profile'])->name('player.profile');
});