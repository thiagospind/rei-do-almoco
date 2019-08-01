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

Route::get('/',function (){
    return view('pretendente');
});

Route::get('/pretendentes','PretendenteController@index');
Route::get('/pretendentes/novo','PretendenteController@create');
Route::post('/pretendente/novo','PretendenteController@store');
Route::post('/pretendente/editar','PretendenteController@update');
Route::get('/pretendente/editar/{$id}','PretendenteController@edit');
Route::get('/pretendente/deletar/{$id}','PretendenteController@destroy');
