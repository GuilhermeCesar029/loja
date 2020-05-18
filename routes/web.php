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
Route::get('/login/sair', 'LoginController@sair')->name('site.login.sair');

Route::group(['middleware'=>'auth'], function(){
    //teste
    Route::get('/carrinho', function(){
        echo "Carrinho de compras";
    });
});
//rota admin
Route::get('/admin', 'AdminController@index')->name('admin');

//login para rota admin
Route::get('/login/admin', 'Auth\AdminLoginController@index')->name('login.admin');
Route::post('/login/admin', 'Auth\AdminLoginController@login')->name('login.admin.submit');