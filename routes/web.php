<?php

use Illuminate\Support\Facades\Route;

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

// welcome page
Route::get('/', 'PlayerController@welcome')->name('welcome');

// general use
Route::any('/search', 'SearchController@index')->name('search');
Route::get('/tag/{tag}', 'PlayerController@getTagged')->name('tag');
Route::get('/track/{id}', 'PlayerController@getTrack')->name('track');
Route::get('/album/{id}', 'PlayerController@getAlbum')->name('album');
Route::get('/artist', 'PlayerController@searchArtist');
Route::get('/album', 'PlayerController@searchAlbum');

Route::post('/track/addplay', 'PlayerController@addPlay');

// user auth
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

// dashboard
Route::redirect('/upload', '/dashboard/upload');
Route::any('dashboard/upload', 'Dashboard\TracksController@create')->name('dashboard.upload');
Route::get('dashboard/tracks', 'Dashboard\TracksController@show')->name('dashboard.tracks');
Route::resource('dashboard/track', 'Dashboard\TracksController');

Route::get('dashboard/profile', 'Dashboard\ProfileController@show')->name('dashboard.profile');
Route::patch('dashboard/profile/update/{id}', 'Dashboard\ProfileController@update')->name('dashboard.profile.update');
