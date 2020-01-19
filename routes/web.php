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

if($_SERVER['HTTP_HOST'] == 'localhost'){
    Route::get('/', function () {
        return redirect(route('login.login'));
    });
} else {
    Route::get('/', function () {
        return redirect('https://financeiro.profracosta.com.br/login');
    });
}
    

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/app', function () {
    return view('app.index');
});

Route::post('/login', 'Auth\LoginController@login')->name('login.login');
Route::get('/logout', 'Auth\LoginController@logout')->name('login.logout');
Route::get('/inserir', 'PagamentosController@inserir')->name('pagamentos.inserir');
Route::get('/saques', 'SaquesController@inserir')->name('saques.inserir');
Route::post('/saques-salvar', 'SaquesController@salvar')->name('saques.salvar');
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

Route::prefix('pagamentos')->middleware('auth')->group(function () {
    Route::get('/', 'PagamentosController@index')->name('pagamentos.index');
    Route::post('/filter', 'PagamentosController@filter')->name('pagamentos.filter');
    Route::get('/create', 'PagamentosController@create')->name('pagamentos.create');
    Route::post('/store', 'PagamentosController@store')->name('pagamentos.store');
});
