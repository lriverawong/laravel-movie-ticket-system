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

// Route::get('/', function () {
//     return view('app');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');// Route::get('/home', 'HomeController@index')->name('home');

/*
|-------------------------------------------------------------------------------
| Displays the home page
|-------------------------------------------------------------------------------
| URL:            /
| Controller:     Web\AppController@getApp
| Method:         GET
| Description:    Displays the homepage with the cafes listing. This kicks off
|                 the single page application.
*/
Route::get( '/', 'Web\AppController@getApp' );

/*
|-------------------------------------------------------------------------------
| Logout
|-------------------------------------------------------------------------------
| URL:            /logout
| Controller:     Web\AppController@getLogout
| Method:         GET
| Description:    Logs out the authenticated user.
*/
Route::get( '/logout', 'Web\AppController@getLogout' )
      ->name('logout');