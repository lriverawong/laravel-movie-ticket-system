<?php

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
    return view('layouts.app');
});

Auth::routes();

# for rendering the base dashboard after login
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/showtimes', function() {
    return view('showtimes');
});

Route::get('/chat', function() {
    return view('chat');
});

Route::get('theatre_complexes/create', 'TheatreComplexController@create');
Route::post('theatre_complexes', 'TheatreComplexController@store');

Route::get('theatres/create', 'TheatreController@create');
Route::post('theatres', 'TheatreController@store');

Route::get('directors/create', 'DirectorController@create');
Route::post('directors', 'DirectorController@store');

Route::get('suppliers/create', 'SupplierController@create');
Route::post('suppliers', 'SupplierController@store');
