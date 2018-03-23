<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function(){
  Route::get('/user', function( Request $request ){
    return $request->user();
  });

  /*
  |-------------------------------------------------------------------------------
  | Get All Movie-Theatre-Complex
  |-------------------------------------------------------------------------------
  | URL:            /api/v1/theatre-complex
  | Controller:     API\TheatreComplexController@getComplexes
  | Method:         GET
  | Description:    Gets all of the movie theatre complexes in the application
  */
  Route::get('/theatre-complexes', 'API\TheatreComplexesController@getComplexes');

  /*
  |-------------------------------------------------------------------------------
  | Get An Individual Theatre Complex
  |-------------------------------------------------------------------------------
  | URL:            /api/v1/theatre-complex/{id}
  | Controller:     API\TheatreComplexesController@getComplex
  | Method:         GET
  | Description:    Gets an individual theatre complex
  */
  Route::get('/theatre-complexes/{id}', 'API\TheatreComplexesController@getComplex');

  /*
  |-------------------------------------------------------------------------------
  | Adds a New Theatre Complex
  |-------------------------------------------------------------------------------
  | URL:            /api/v1/theatre-complexes
  | Controller:     API\TheatreComplexesController@postNewComplex
  | Method:         POST
  | Description:    Adds a new theatre complex to the application
  */
  Route::post('/theatre-complexes', 'API\TheatreComplexesController@postNewComplex');

});


