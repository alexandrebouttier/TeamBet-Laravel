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

Route::get('/', 'HomeController@home');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/pronostics', 'BetsController@index')->name('bets');
Route::get('/pronostic/{type}/{id}', 'BetController@index')->name('bet');
Route::get('/historique', 'HistoryController@history')->name('history');

Route::get('/contact', function () {
    return view('pages/contact');
});


Route::group(['prefix' => 'abpronosWPS'], function () {
    Voyager::routes();
});
