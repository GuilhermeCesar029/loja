<?php


Route::get('/', 'HomeController@index')->name('home');
Route::get('/produto/{id}', 'HomeController@produto')->name('produto');

//Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
/*/Rotas para o cadastro
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
*/

//login para rota admin
Route::get('/login/admin', 'Auth\AdminLoginController@index')->name('login.admin');
Route::post('/login/admin', 'Auth\AdminLoginController@login')->name('login.admin.submit');
Route::get('/login/admin/sair', 'Auth\AdminLoginController@sair')->name('admin.sair');

Route::group(['middleware'=>'auth:admin'], function(){
    //rota admin
    Route::get('/admin', 'Produto\AdminController@index')->name('admin');
    Route::get('/cadastrar_produto', 'Produto\ProdutoController@index')->name('cadastro.produto.index');
    Route::post('/cadastrar_produto', 'Produto\ProdutoController@cadastrar')->name('cadastro.produto.submit');
    Route::get('/admin/produto/editar/{id}', 'Produto\ProdutoController@editar')->name('cadastro.produto.editar');
    Route::put('/admin/produto/editar/{id}', 'Produto\ProdutoController@atualizar')->name('cadastro.produto.atualizar');
    Route::get('/admin/produto/excluir/{id}', 'Produto\ProdutoController@excluir')->name('cadastro.produto.excluir');
});



Auth::routes();
