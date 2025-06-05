<?php

use Illuminate\Http\Request;


Route::post('login', 'Auth\LoginController@login');

Route::get('/entidades', 'EntidadeController@index');
Route::post('/entidades', 'EntidadeController@store');
Route::get('/entidades/buscar/{id}', 'EntidadeController@show');
Route::delete('/entidades/{id}', 'EntidadeController@destroy');
Route::put('/entidades/{id}', 'EntidadeController@update');
Route::get('/entidades/regionais', 'RegionalController@index');
Route::get('/entidades/especialidades', 'EspecialidadeController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





