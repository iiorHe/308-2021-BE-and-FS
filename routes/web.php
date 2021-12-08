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

Route::resource('games', "App\Http\Controllers\GamesController");

Route::resource('engines',"App\Http\Controllers\EngineController");
// Route::get('/games', "App\Http\Controllers\GamesController@index");

// Route::get('/games/create', "App\Http\Controllers\GamesController@create");

// Route::get('/games-json',"App\Http\Controllers\GamesController@getList");

// Route::post('/games', "App\Http\Controllers\GamesController@store");
// Route::get('/games/{id}/edit', "App\Http\Controllers\GamesController@edit");
// Route::patch('/games/{id}', "App\Http\Controllers\GamesController@update");

// Route::delete('/games/{id}', "App\Http\Controllers\GamesController@destroy");
// Route::get('/games/{id}',"App\Http\Controllers\GamesController@show");