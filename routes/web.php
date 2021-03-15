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

// Auth::routes(['verify' => true]);
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/', 'App\Http\Controllers\frontend\HomeController@index')->name('frontend.home')->middleware('auth');
Route::get('/AboutUs', 'App\Http\Controllers\frontend\HomeController@aboutus')->name('about-us')->middleware('auth');
Route::get('/registration', 'App\Http\Controllers\frontend\HomeController@registration')->name('registration');
Route::get('/Register', 'App\Http\Controllers\frontend\HomeController@chooseregister')->name('choose-register');
Route::get('/Login', 'App\Http\Controllers\frontend\HomeController@login')->name('custom-login');
Route::get('/search-photographer', 'App\Http\Controllers\frontend\HomeController@searchphotographer')->name('search-photographer')->middleware('auth');
Route::post('/filter-photographer', 'App\Http\Controllers\frontend\HomeController@filterphotographer')->name('filter-photographer')->middleware('auth');
Route::post('/filter2-photographer', 'App\Http\Controllers\frontend\HomeController@filter2photographer')->name('filter2-photographer')->middleware('auth');
Route::get('/profile{user}/profile', 'App\Http\Controllers\frontend\HomeController@profile')->name('profile')->middleware('auth');


Route::get('/multiuploads', 'App\Http\Controllers\backend\PhotographerController@uploadForm')->name('multiuploads');
Route::post('/multiuploads', 'App\Http\Controllers\backend\PhotographerController@uploadSubmit')->name('multiuploads');


Route::get('frontend/photographer/{user}/edit', 'App\Http\Controllers\frontend\PhotographerController@edit')->name('frontend.photographer.edit');
Route::get('/get-states','App\Http\Controllers\frontend\PhotographerController@getStates')->name('get-states');
Route::get('/get-cities','App\Http\Controllers\frontend\PhotographerController@getCities')->name('get-cities');
// Route::post('get-states-by-country','CountryStateCityController@getState');
// Route::post('get-cities-by-state','CountryStateCityController@getCity');

Route::get('/CustomerRegister', 'App\Http\Controllers\frontend\CustomerController@register')->name('customer-register');
Route::get('/Select-typeofshoot', 'App\Http\Controllers\frontend\PhotographerController@SelectTypeOfShootIndex')->name('Select-typeofshoot');
Route::post('/Select-typeofshoot', 'App\Http\Controllers\frontend\PhotographerController@SelectTypeOfShootStore')->name('Select-typeofshoot');
Route::get('/PhotographerRegister', 'App\Http\Controllers\frontend\PhotographerController@register')->name('photographer-register');




Route::namespace('App\Http\Controllers\frontend')->prefix('frontend')->name('frontend.')->group(function(){
    Route::resource('/customer', 'CustomerController', ['except' => ['show', 'create']]);
});

Route::namespace('App\Http\Controllers\frontend')->prefix('frontend')->name('frontend.')->group(function(){
    Route::resource('/photographer', 'PhotographerController', ['except' => [  'edit','create']]);
});

Route::namespace('App\Http\Controllers\backend')->prefix('backend')->name('backend.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::namespace('App\Http\Controllers\backend')->prefix('backend')->name('backend.')->group(function(){
    Route::resource('/photographer', 'PhotographerController', ['except' => [ 'update','index' ,'create', 'store']]);
});
Route::get('/backend{user}/profile', 'App\Http\Controllers\backend\PhotographerController@index')->name('backend.photographer.index');
Route::get('/backend{user}/edit', 'App\Http\Controllers\backend\PhotographerController@edit')->name('backend.photographer.edit');
Route::PUT('backend/{user}', 'App\Http\Controllers\backend\PhotographerController@update')->name('backend.photographer.update');


Route::get('/phpartisanmigrate', function () {
$exitCode = Artisan::call('migrate');
});

Route::get('/phpartisandbseed', function () {
$exitCode = Artisan::call('db:seed');
});