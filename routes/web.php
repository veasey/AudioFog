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
Route::redirect('/upload', '/dashboard/upload');
Route::any('dashboard/upload', 'Dashboard\TracksController@create')->name('dashboard.upload');
Route::get('dashboard/tracks', 'Dashboard\TracksController@show')->name('dashboard.tracks');
Route::resource('track', 'Dashboard\TracksController');

// user auth
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

// upload tracks
Route::get('/tag/{tag}', 'PlayerController@getTagged')->name('tag');
Route::get('/track/{id}', 'PlayerController@getTrack')->name('track');
Route::post('/track/addplay', 'PlayerController@addPlay');
