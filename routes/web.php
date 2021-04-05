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

    Route::get('/live', function () {
        return view('live');
    })->name('liveshow');

    Route::get('/gts', function () {
        return view('gts');
    });

    Route::resources([
        'users' => 'App\Http\Controllers\UserController',
        'nationals' => 'App\Http\Controllers\NationalController',
        'nationals_achievements' => 'App\Http\Controllers\NationalAchievementController',
        'nationals_bloodlines' => 'App\Http\Controllers\NationalBloodlineController',
        'nationals_images' => 'App\Http\Controllers\NationalImageController',
        'nationals_videos' => 'App\Http\Controllers\NationalVideoController',
        'products' => 'App\Http\Controllers\ProductController',
        'products_videos' => 'App\Http\Controllers\ProductVideoController',
        'products_comments' => 'App\Http\Controllers\ProductCommentController',
        'showcases' => 'App\Http\Controllers\ShowcaseController',
        'regionals' => 'App\Http\Controllers\RegionalController',
        'regionals_locations' => 'App\Http\Controllers\RegionalLocationController',
    ]);
    
    Route::prefix('search')->group(function () {
        Route::post('users', 'App\Http\Controllers\UserController@search')->name('users.search');
        Route::post('nationals', 'App\Http\Controllers\NationalController@search')->name('nationals.search');
        Route::post('regionals', 'App\Http\Controllers\RegionalController@search')->name('regionals.search');
        Route::post('products', 'App\Http\Controllers\ProductController@search')->name('products.search');
        Route::post('showcases', 'App\Http\Controllers\ShowcaseController@search')->name('showcases.search');
    });

    Route::prefix('guests')->group(function () {
        Route::get('/nationals', 'App\Http\Controllers\NationalController@guests')->name('nationals.guests');
        Route::get('/regionals', 'App\Http\Controllers\RegionalController@guests')->name('regionals.guests');
        Route::get('/products', 'App\Http\Controllers\ProductController@guests')->name('products.guests');
        Route::get('/showcases', 'App\Http\Controllers\ShowcaseController@guests')->name('showcases.guests');
    });

    Route::get('/category/{category}', 'App\Http\Controllers\ProductController@category')->name('products.list');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
