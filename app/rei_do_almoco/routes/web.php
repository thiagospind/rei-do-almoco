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

Route::get('/candidato','CandidateController@index');
Route::get('/votar','VoteController@index');
Route::post('/votar','VoteController@store');
Route::get('/candidato/novo','CandidateController@create');
Route::post('/candidato/novo','CandidateController@store');
Route::post('/candidato/editar','CandidateController@update');
Route::get('/candidato/editar/{$id}','CandidateController@edit');
Route::get('/candidato/deletar/{$id}','CandidateController@destroy');
