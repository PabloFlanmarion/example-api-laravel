<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', "CategoriaController@notific");
Route::get('/v1/categorias', "CategoriaController@index");
Route::get('/v1/categoria/{id}', "CategoriaController@show");
Route::post('/v1/categoria/inserir','CategoriaController@store');
Route::put('/v1/categoria/alterar','CategoriaController@update');
Route::delete('/v1/categoria/deletar/{id}','CategoriaController@destroy');
