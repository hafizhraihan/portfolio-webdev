<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\pagecontrolController;

// use function PHPUnit\Framework\callback;

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

Route::get('/', [frontendController::class, "index"]);

Route::redirect('home','dashboard');

Route::get('/auth',[authController::class,"index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout',[authController::class,"logout"]);

Route::prefix('dashboard')->middleware('auth')->group(
    function(){
        Route::get('/',[pagesController::class, 'index']);
        Route::resource('pages', pagesController::class);
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
        Route::resource('project', projectController::class);
        Route::get('skill',[skillController::class,"index"])->name('skill.index');
        Route::post('skill',[skillController::class,"update"])->name('skill.update');
        Route::get('profile',[profileController::class,"index"])->name('profile.index');
        Route::post('profile',[profileController::class,"update"])->name('profile.update');
        Route::get('pagecontrol',[pagecontrolController::class,"index"])->name('pagecontrol.index');
        Route::post('pagecontrol',[pagecontrolController::class,"update"])->name('pagecontrol.update');
    }
);
