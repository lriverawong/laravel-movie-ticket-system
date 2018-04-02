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

// =================== PUBLIC ROUTES ====================================================

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');

Route::get('/showtimes', function() {
    return view('showtimes');
});





Route::resource('run_dates', 'RunDateController')->middleware('is_admin');

Route::resource('purchases', 'PurchaseController');



Route::resource('users', 'UserController')->only([
    'index', 'show', 'edit', 'update', 'destroy'
]);

Route::get('/movies_playing', 'MovieController@playing')->name('movies_playing');

Route::get('/rentals', 'PurchaseController@rentals')->name('rentals');

Route::get('/reviews', 'MovieController@reviews')->name('reviews');

Route::get('/movies/{movie}', 'MovieController@public_show')->name('movie.public_show');
Route::post('/movies/write_review', 'MovieController@write_review')->name('movie.write_review');

Route::get('/theatre_complexes', 'TheatreComplexController@public_index')->name('theatre_complexes');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile_edit/{id}', 'UserController@edit')->name('users.edit_profile');
    Route::resource('cart', 'CartController', [
        'only' => [
            'index', 'create', 'show', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'cart',
            'create' => 'cart.create',
            'show' => 'cart.show',
            'store' => 'cart.store',
            'edit' => 'cart.edit',
            'update' => 'cart.update',
            'destroy' => 'cart.destroy'
        ]
    ]);
    Route::get('/theatre_complexes/{theatre_complexes}', 'TheatreComplexController@public_show')->name('theatre_complexes.show');    
});

// =================== ADMIN ROUTES ====================================================

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
    Route::get('users/{user_id}/purchase_history', 'UsersManagementController@purchase_history')->name('admin.users.purchase_history');
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
    Route::resource('movies', 'MovieController', [
        'only' => [
            'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'admin.movies',
            'show' => 'admin.movies.show',
            'create' => 'admin.movies.create',
            'store' => 'admin.movies.store',
            'edit' => 'admin.movies.edit',
            'update' => 'admin.movies.update',
            'destroy' => 'admin.movies.destroy'
        ]
    ]);
    Route::resource('show_times', 'ShowTimeController', [
        'only' => [
            'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
        ],
        'names' => [
            'index' => 'admin.show_times',
            'show' => 'admin.show_times.show',
            'create' => 'admin.show_times.create',
            'store' => 'admin.show_times.store',
            'edit' => 'admin.show_times.edit',
            'update' => 'admin.show_times.update',
            'destroy' => 'admin.show_times.destroy'
        ]
    ]);

    Route::get('movie_stats', 'PurchaseController@movie_stats')->name('admin.movie_stats');
    
    Route::get('complex_stats', 'PurchaseController@complex_stats')->name('admin.complex_stats');

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

// Route::resource('movies', 'MovieController')->middleware('is_admin');

// Route::get('/chat', function() {
//     return view('chat');
// });