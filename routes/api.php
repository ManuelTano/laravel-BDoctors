<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {

    // Tutte le rotte per i dottori
    Route::resource('users', 'UserController');

    // Rotta che filtra i dottori in base all'input
    Route::get('/users/filter/{query}', 'UserController@filterByInput');

    // Rotta che filtra i dottori in base alla specialistica
    Route::get('/users/specialty/{query}', 'UserController@filterBySpecialty');

    // Rotta per prelevare le recensioni di un dottore
    Route::get('/reviews/user/{id}','UserController@fetchReviews');

    // Rotta per inviare una recensione al dottore
    Route::get('/user/new-review','UserController@sendNewReview');

    // Rotta per inviare un messaggio al dottore
    Route::get('/user/new-message','UserController@sendNewMessage');

    // Rotta per far restituire tutte le specializzazione
    Route::get('/specialties','SpecialtyController@index');
});