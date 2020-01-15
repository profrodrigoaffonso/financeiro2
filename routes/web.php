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
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', 'Auth\LoginController@login')->name('login.login');
Route::get('/logout', 'Auth\LoginController@logout')->name('login.logout');
Route::get('/inserir', 'PagamentosController@inserir')->name('pagamentos.inserir');
Route::post('/salvar', 'PagamentosController@salvar')->name('pagamentos.salvar');

Route::prefix('home')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
   
});

Route::prefix('bancos')->middleware('auth')->group(function () {
    Route::get('/', 'BancosController@index')->name('bancos.index');
    Route::get('/create', 'BancosController@create')->name('bancos.create');
    Route::post('/store', 'BancosController@store')->name('bancos.store');
});

Route::prefix('categorias')->middleware('auth')->group(function () {
    Route::get('/', 'CategoriasController@index')->name('categorias.index');
    Route::get('/create', 'CategoriasController@create')->name('categorias.create');
    Route::post('/store', 'CategoriasController@store')->name('categorias.store');
});

Route::prefix('forma-pagamentos')->middleware('auth')->group(function () {
    Route::get('/', 'FormaPagamentosController@index')->name('forma_pagamentos.index');
    Route::get('/create', 'FormaPagamentosController@create')->name('forma_pagamentos.create');
    Route::post('/store', 'FormaPagamentosController@store')->name('forma_pagamentos.store');
});
