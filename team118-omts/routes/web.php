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
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'UserController@index')->name('home');

Route::get('/showtimes', function() {
    return view('showtimes');
});

Route::get('/chat', function() {
    return view('chat');
});

// Route::get('theatre_complexes/create', 'TheatreComplexController@create');
// Route::post('theatre_complexes', 'TheatreComplexController@store');

// Route::get('theatres/create', 'TheatreController@create');
// Route::post('theatres', 'TheatreController@store');

// Route::get('directors/create', 'DirectorController@create');
// Route::post('directors', 'DirectorController@store');

// Route::get('suppliers/create', 'SupplierController@create');
// Route::post('suppliers', 'SupplierController@store');

// Route::get('movies/create', 'MovieController@create');
// Route::post('movies', 'MovieController@store');

// Route::get('production_companies/create', 'ProductionCompanyController@create')->middleware('is_admin');
// Route::post('production_companies', 'ProductionCompanyController@store');


//Route::resource('directors', 'DirectorController')->middleware('is_admin');

//Route::resource('suppliers', 'SupplierController')->middleware('is_admin');

//Route::resource('theatre_complexes', 'TheatreComplexController')->middleware('is_admin');

//Route::resource('theatres', 'TheatreController')->middleware('is_admin');

//Route::resource('production_companies', 'ProductionCompanyController')->middleware('is_admin');

Route::resource('movies', 'MovieController')->middleware('is_admin');

Route::resource('run_dates', 'RunDateController')->middleware('is_admin');

Route::resource('users', 'UserController')->only([
    'index', 'show', 'edit', 'update', 'destroy'
    ]);

Route::group(['middleware' => ['auth', 'is_admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@home')->middleware('is_admin')->name('admin-home');
    Route::resource('users', 'UsersManagementController', [
        'only' => [
            'index', 'create', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'admin.users',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy'
        ]
    ]);
    Route::resource('directors', 'DirectorController', [
        'only' => [
            'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'admin.directors',
            'show' => 'admin.directors.show',
            'create' => 'admin.directors.create',
            'store' => 'admin.directors.store',
            'edit' => 'admin.directors.edit',
            'update' => 'admin.directors.update',
            'destroy' => 'admin.directors.destroy'
        ]
    ]);
    Route::resource('suppliers', 'SupplierController', [
        'only' => [
            'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'admin.suppliers',
            'show' => 'admin.suppliers.show',
            'create' => 'admin.suppliers.create',
            'store' => 'admin.suppliers.store',
            'edit' => 'admin.suppliers.edit',
            'update' => 'admin.suppliers.update',
            'destroy' => 'admin.suppliers.destroy'
        ]
    ]);
    Route::resource('theatre_complexes', 'TheatreComplexController', [
        'only' => [
            'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'admin.theatre_complexes',
            'show' => 'admin.theatre_complexes.show',
            'create' => 'admin.theatre_complexes.create',
            'store' => 'admin.theatre_complexes.store',
            'edit' => 'admin.theatre_complexes.edit',
            'update' => 'admin.theatre_complexes.update',
            'destroy' => 'admin.theatre_complexes.destroy'
        ]
    ]);
    Route::resource('theatres', 'TheatreController', [
        'only' => [
            'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'admin.theatres',
            'show' => 'admin.theatres.show',
            'create' => 'admin.theatres.create',
            'store' => 'admin.theatres.store',
            'edit' => 'admin.theatres.edit',
            'update' => 'admin.theatres.update',
            'destroy' => 'admin.theatres.destroy'
        ]
    ]);
    Route::resource('production_companies', 'ProductionCompanyController', [
        'only' => [
            'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'admin.production_companies',
            'show' => 'admin.production_companies.show',
            'create' => 'admin.production_companies.create',
            'store' => 'admin.production_companies.store',
            'edit' => 'admin.production_companies.edit',
            'update' => 'admin.production_companies.update',
            'destroy' => 'admin.production_companies.destroy'
        ]
    ]);

});