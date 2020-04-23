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
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::get('/login/twitter', 'Auth\LoginController@redirectToTwitter');
Route::get('/login/twitter/callback', 'Auth\LoginController@handleTwitterCallback');

// access token :1234476725989298182-rzMhYvhKEPGL1s5w6BkitoCeBGNRma
// Access token secret :CdEPlZHjWJvsJIO5Bfa79FpowtQhxtrB9mFt8vPOQHVxa
