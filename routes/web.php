<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

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

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin')->group(function(){
  Route::resource('sponsorships','SponsorshipController');
   
});


