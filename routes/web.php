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

Route::get('/', "App\Http\Controllers\PagesController@home");

Route::get('/project', "App\Http\Controllers\PagesController@project");

Route::get('/games', "App\Http\Controllers\GamesController@index");

Route::get('/games-json',"App\Http\Controllers\GamesController@getList");
