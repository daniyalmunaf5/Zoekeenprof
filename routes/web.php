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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/', 'App\Http\Controllers\frontend\HomeController@index')->name('frontend.home');
Route::get('/AboutUs', 'App\Http\Controllers\frontend\HomeController@aboutus')->name('about-us');
Route::get('/registration', 'App\Http\Controllers\frontend\HomeController@registration')->name('registration');
Route::get('/Register', 'App\Http\Controllers\frontend\HomeController@chooseregister')->name('choose-register');
Route::get('/Login', 'App\Http\Controllers\frontend\HomeController@login')->name('custom-login');
Route::get('/search-photographer', 'App\Http\Controllers\frontend\HomeController@searchphotographer')->name('search-photographer')->middleware('auth');
Route::post('/filter-photographer', 'App\Http\Controllers\frontend\HomeController@filterphotographer')->name('filter-photographer');

Route::get('/get-states','App\Http\Controllers\frontend\PhotographerController@getStates')->name('get-states');
Route::get('/get-cities','App\Http\Controllers\frontend\PhotographerController@getCities')->name('get-cities');
// Route::post('get-states-by-country','CountryStateCityController@getState');
// Route::post('get-cities-by-state','CountryStateCityController@getCity');

Route::get('/CustomerRegister', 'App\Http\Controllers\frontend\CustomerController@register')->name('customer-register');

Route::get('/PhotographerRegister', 'App\Http\Controllers\frontend\PhotographerController@register')->name('photographer-register');




Route::namespace('App\Http\Controllers\frontend')->prefix('frontend')->name('frontend.')->group(function(){
    Route::resource('/customer', 'CustomerController', ['except' => ['show', 'create']]);
});

Route::namespace('App\Http\Controllers\frontend')->prefix('frontend')->name('frontend.')->group(function(){
    Route::resource('/photographer', 'PhotographerController', ['except' => ['show', 'create']]);
});

Route::namespace('App\Http\Controllers\backend')->prefix('backend')->name('backend.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});