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

Route::prefix('bancos')->group(function () {
    Route::get('/', 'BancosController@index')->name('bancos.index');
    Route::get('/create', 'BancosController@create')->name('bancos.create');
    Route::post('/store', 'BancosController@store')->name('bancos.store');
});

Route::prefix('categorias')->group(function () {
    Route::get('/', 'CategoriasController@index')->name('categorias.index');
    Route::get('/create', 'CategoriasController@create')->name('categorias.create');
    Route::post('/store', 'CategoriasController@store')->name('categorias.store');
});

Route::prefix('forma-pagamentos')->group(function () {
    Route::get('/', 'FormaPagamentosController@index')->name('forma_pagamentos.index');
    Route::get('/create', 'FormaPagamentosController@create')->name('forma_pagamentos.create');
    Route::post('/store', 'FormaPagamentosController@store')->name('forma_pagamentos.store');
});
