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

Route::get('/', 'PlayerController@welcome')->name('welcome');
Route::get('/tag/{tag}', 'PlayerController@taggedTracks')->name('tag');

Auth::routes();

Route::redirect('/upload', '/dashboard/upload');
Route::any('dashboard/upload', 'Dashboard\TracksController@create')->name('dashboard.upload');
Route::get('dashboard/tracks', 'Dashboard\TracksController@show')->name('dashboard.tracks');
Route::resource('track', 'Dashboard\TracksController');
