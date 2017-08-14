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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user-count', 'JsonController@userCount');
Route::get('/user-availability', 'JsonController@userAvailability');
//Route::resource('/match', 'MatchController');
Route::get('/match', 'MatchController@create')->name('match.create');
Route::post('/match', 'MatchController@store')->name('match.store');

Route::get('/matches', 'MatchController@directory');
Route::get('/match/{id}', 'MatchController@show');