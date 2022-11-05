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

    // # Tutte le rotte per i dottori

    Route::resource('users', 'UserController');

    // # FILTRI DI RICERCA LATO FRONT

    // Rotta che filtra i dottori in base all'input
    Route::get('/users/filter/{query}', 'UserController@filterByInput');

    // Rotta che restituisce tutti i dottori sponsorizzati
    Route::get('/featured-users','UserController@fetchFeaturedDoctors');

    // Rotta che filtra i dottori in base alla specialistica
    Route::get('/users/specialty/{query}', 'UserController@filterBySpecialty');

    // Rotta che filtra i dottori in base al numero di recensioni
    Route::get('/users-by-reviews', 'UserController@filterByMoreReviews');

    // Rotta che filtra i dottori in base al rating
    Route::get('/users-by-rating', 'UserController@filterByBestRating');

    // Rotta che raffina il filtro in base al numero recensioni
    Route::get('/users-raffinate-by-review/{query}', 'UserController@raffinateFilterByMoreReviews');

    // Rotta che raffina il filtro in base alla media voto
    Route::get('/users-raffinate-by-rating/{query}', 'UserController@raffinateFilterByBestRating');

    // # ROTTE CHE PRELEVANO I DATI DEI DOTTORI

    // Rotta per prelevare le recensioni di un dottore
    Route::get('/reviews/user/{id}','UserController@fetchReviews');

    // # ROTTE CHE INVIANO MESSAGGI E RECENSIONI

    // Rotta per inviare una recensione al dottore
    Route::post('/new-review/{id}','SendDoctorReview@sendNewReview');

    // Rotta per inviare un messaggio al dottore
    Route::post('/new-message/{id}','ContactDoctor@sendNewMessage');

    // # ROTTA CHE RESTITUISCE TUTTE LE SPECIALIZZAZIONI

    Route::get('/specialties','SpecialtyController@index');

    Route::get('/specialties/{id}','SpecialtyController@show');

    // # ROTTA RELATIVE ALLE REVIEWS DEI DOTTORi
    
    Route::get('/doctor-reviews/{id}','ReviewController@fetchReviewsFromDoctor');
});