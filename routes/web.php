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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/faqs', function () {
	return view('faqs');
});
Route::get('/user-count', 'JsonController@userCount');
Route::get('/user-availability', 'JsonController@userAvailability');

Route::get('/match', 'MatchController@create')->name('match.create')->middleware('auth');
Route::post('/match', 'MatchController@store')->name('match.store')->middleware('auth');

Route::get('/matches', 'MatchController@directory');
Route::get('/my-matches', 'MatchController@myDirectory')->middleware('auth');
Route::get('/match/{id}', 'MatchController@show');
Route::post('/match/{id}/join', 'MatchController@join')->middleware('auth');
Route::post('/match/{id}/delete', 'MatchController@delete')->middleware('auth');