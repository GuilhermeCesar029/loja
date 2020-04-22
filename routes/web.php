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



Route::get('/', 'HomeController@index')->name('home');

//Rotas para o cadastro
Route::get('/cadastro', 'CadastroController@index')->name('site.cadastro.index');
Route::post('/cadastro', 'CadastroController@cadastrar')->name('site.cadastro');

//rotas para login
Route::get('/login', 'LoginController@index')->name('site.login.index');
Route::post('/login', 'LoginController@entrar')->name('site.login.entrar');