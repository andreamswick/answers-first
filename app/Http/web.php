<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(Auth::guest()) {
        return view('welcome');
    }
    else {
        $games = \App\Game::all();
        return view('home', compact('games'));
    }
});

Route::auth();

Route::get('game', 'GameController@index')->name('game.index');
Route::post('game', 'GameController@store')->name('game.store');
Route::get('game/create', 'GameController@create')->name('game.create');
Route::get('game/{game}', 'GameController@show')->name('game.show');
Route::delete('game/{game}', 'GameController@destroy')->name('game.destroy');
Route::patch('game/{game}', 'GameController@update')->name('game.update');
Route::get('game/{game}/edit', 'GameController@edit')->name('game.edit');
