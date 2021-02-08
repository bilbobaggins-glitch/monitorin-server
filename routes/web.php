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

Route::get('/', function () {
    return view('welcome');
});

//NOVO

Route::get('/login', 'MeuController@login')->middleware('cors');

Route::post('/turma', 'MeuController@turmaPOST')->middleware('cors');

Route::post('/testepostman', 'MeuController@testepostmanPOST')->middleware('cors');
