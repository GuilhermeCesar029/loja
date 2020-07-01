<?php


Auth::routes();

//rotas da tela inicial e tela de produtos
Route::get('/', 'HomeController@index')->name('home');
Route::get('/produto/{id}', 'HomeController@produto')->name('produto');

//rotas para carrinho de compras
Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');
Route::get('/carrinho/adicionar', function(){
    return redirect()->route('index');
});
Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');

//login para rota admin
Route::get('/login/admin', 'Auth\AdminLoginController@index')->name('login.admin');
Route::post('/login/admin', 'Auth\AdminLoginController@login')->name('login.admin.submit');
Route::get('/login/admin/sair', 'Auth\AdminLoginController@sair')->name('admin.sair');
//rotas do admin
Route::group(['middleware'=>'auth:admin'], function(){
    Route::get('/admin', 'Produto\AdminController@index')->name('admin');
    Route::get('/admin/cadastrar_produto', 'Produto\ProdutoController@index')->name('cadastro.produto.index');
    Route::post('/admin/cadastrar_produto', 'Produto\ProdutoController@cadastrar')->name('cadastro.produto.submit');
    Route::get('/admin/produto/editar/{id}', 'Produto\ProdutoController@editar')->name('cadastro.produto.editar');
    Route::put('/admin/produto/editar/{id}', 'Produto\ProdutoController@atualizar')->name('cadastro.produto.atualizar');
    Route::get('/admin/produto/excluir/{id}', 'Produto\ProdutoController@excluir')->name('cadastro.produto.excluir');
});





