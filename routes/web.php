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
    return view('welcome');
});

// Aggiungiamo tutte le rotte per l'autenticazione

Auth::routes();

// Authenticate users routes

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::resource('sponsorships','SponsorshipController');

    // Definiamo tutte le rotte relative agli utenti (dottori)
    Route::resource('users','UserController');

    // Redirect in Page Not Found in caso di url errato o non gestito
    
    Route::get('{any?}', function(){
        abort('404');
    })->where('any','.*');
});

// Pagina d'atterraggio al login

Route::get('/home', 'HomeController@index')->name('home');

// Redirect su pagina di Welcome 

Route::get('{any?}', function(){
    return view('welcome');
})->where('any','.*');
  


