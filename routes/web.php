<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user-profile', 'App\Http\Controllers\ProfileController@showProfile');
Route::post('/user-profile', 'App\Http\Controllers\ProfileController@updateProfile');
Route::get('/home', 'App\Http\Controllers\HomeController@showProgress');
Route::get('/addFood', 'App\Http\Controllers\FoodListController@index');
Route::get('/addFood/search', 'App\Http\Controllers\FoodListController@search')->name('addFood.search');
Route::post('/addFood/add/{food}', 'App\Http\Controllers\FoodListController@addFood')->name('addFood.add');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
