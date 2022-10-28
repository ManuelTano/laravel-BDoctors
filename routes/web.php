<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

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
    return view('guest.home');
})->name('guest.home');

// Aggiungiamo tutte le rotte per l'autenticazione

Auth::routes();

// Authenticate users routes

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::resource('sponsorships', 'SponsorshipController');

    // Definiamo le rotte relative agli utenti (dottori)
    Route::put('/users/update', 'UserController@update')->name('users.update');

    // Rotta per l'edit e l'update del profilo

    Route::get('/userdetails', 'UserDetailController@index')->name('userdetails.index');
    Route::get('/userdetails/edit', 'UserDetailController@edit')->name('userdetails.edit');
    Route::put('/userdetails/update', 'UserDetailController@update')->name('userdetails.update');

    // Rotta per l'edit e l'update dei messages

    Route::get('/messages', 'MessageController@index')->name('messages.index');
    Route::get('/messages/{message}', 'MessageController@show')->name('messages.show');

    // Rotta per l'edit e l'update dei reviews

    Route::get('/reviews', 'ReviewController@index')->name('reviews.index');
    Route::get('/reviews/{review}', 'ReviewController@show')->name('reviews.show');

    // Redirect in Page Not Found in caso di url errato o non gestito

    Route::get('{any?}', function () {
        abort('404');
    })->where('any', '.*');
});

// Pagina d'atterraggio al login

Route::get('/home', 'HomeController@index')->name('home');

// Redirect su pagina di Welcome 

Route::get('/{any?}', function () {
    return view('guest.home');
})->where('any', '.*');