<?php

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

Route::get('/', function () {
    return view('auth.register');
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resources([
        'users' => 'App\Http\Controllers\UserController',
        'nationals' => 'App\Http\Controllers\NationalController',
        'nationals_achievements' => 'App\Http\Controllers\NationalAchievementController',
        'nationals_bloodlines' => 'App\Http\Controllers\NationalBloodlineController',
        'nationals_images' => 'App\Http\Controllers\NationalImageController',
        'nationals_videos' => 'App\Http\Controllers\NationalVideoController',
        'showcases' => 'App\Http\Controllers\ShowcaseController',
    ]);
    
    Route::prefix('search')->group(function () {
        Route::post('users', 'App\Http\Controllers\UserController@search')->name('users.search');
        Route::post('nationals', 'App\Http\Controllers\NationalController@search')->name('nationals.search');
        Route::post('showcases', 'App\Http\Controllers\ShowcaseController@search')->name('showcases.search');
    });

    Route::prefix('guests')->group(function () {
        Route::get('/nationals', 'App\Http\Controllers\NationalController@guests')->name('nationals.guests');
        Route::get('/showcases', 'App\Http\Controllers\ShowcaseController@guests')->name('showcases.guests');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
