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

//Rotas para entrar e cadastrar produtos. 
Route::get('/produto/entrar', 'LoginProductController@index')->name('produto.index');
Route::post('/produto/entrar', 'LoginProductController@entrar')->name('produto.entrar');

//Rotas protegidas para intranet
Route::group(['middleware'=>'product'], function(){
    //Rotas para cadastrar produtos
    Route::get('/produto', 'ProdutoController@index')->name('produto.cadastrar.index');
    Route::post('/produto/cadastrar', 'ProdutoController@cadastrar')->name('produto.cadastrar');
    Route::get('/produtos/editar/{id}', 'ProdutoController@editar')->name('produto.editar');
    Route::put('/produtos/atualizar/{id}', 'ProdutoController@atualizar')->name('produto.atualizar');
    Route::delete('/produtos/deletar/{id}', 'ProdutoController@deletar')->name('produto.deletar');
});