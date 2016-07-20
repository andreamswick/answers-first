<?php

/*
|--------------------------------------------------------------------------
| Application API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api'], function () {
    Route::get('game', 'GameController@index')->name('api.game.index');
    Route::post('game', 'GameController@store')->name('api.game.store');
    Route::get('game/create', 'GameController@create')->name('api.game.create');
    Route::get('game/{game}', 'GameController@show')->name('api.game.show');
    Route::delete('game/{game}', 'GameController@destroy')->name('api.game.destroy');
    Route::patch('game/{game}', 'GameController@update')->name('api.game.update');
    Route::get('game/{game}/edit', 'GameController@edit')->name('api.game.edit');
});

