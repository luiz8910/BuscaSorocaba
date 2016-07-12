<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Categorias

Route::get('/categoria', ['as' => 'admin.categoria.index', 'uses' => 'CategoriaController@index']);

Route::get('/categoria/novo', ['as' => 'admin.categoria.create', 'uses' => 'CategoriaController@create']);

Route::get('/categoria/editar/{id}', ['as' => 'admin.categoria.edit', 'uses' => 'CategoriaController@edit']);

Route::post('/categoria/alterar/{id}', ['as' => 'admin.categoria.update', 'uses' => 'CategoriaController@update']);

Route::post('/categoria/salvar', ['as' => 'admin.categoria.store', 'uses' => 'CategoriaController@store']);

Route::get('/categoria/excluir/{id}', ['as' => 'admin.categoria.destroy', 'uses' => 'CategoriaController@destroy']);

//Fim Categorias

//Sub Categorias

Route::get('/subCategoria', ['as' => 'admin.subcategoria.index', 'uses' => 'SubCategoriaController@index']);

Route::get('/subCategoria/novo', ['as' => 'admin.subcategoria.create', 'uses' => 'SubCategoriaController@create']);

Route::get('/subCategoria/editar/{id}', ['as' => 'admin.subcategoria.edit', 'uses' => 'SubCategoriaController@edit']);

Route::post('/subCategoria/alterar/{id}', ['as' => 'admin.subcategoria.update', 'uses' => 'SubCategoriaController@update']);

Route::post('/subCategoria/salvar', ['as' => 'admin.subcategoria.store', 'uses' => 'SubCategoriaController@store']);

Route::get('/subCategoria/excluir/{id}', ['as' => 'admin.subcategoria.destroy', 'uses' => 'SubCategoriaController@destroy']);

//Fim Sub Categorias

//Estabelecimentos

Route::get('/estabelecimentos', ['as' => 'admin.estabelecimentos.index', 'uses' => 'EstabelecimentosController@index']);

Route::get('/estabelecimentos/novo', ['as' => 'admin.estabelecimentos.create', 'uses' => 'EstabelecimentosController@create']);

Route::get('/estabelecimentos/editar/{id}', ['as' => 'admin.estabelecimentos.edit', 'uses' => 'EstabelecimentosController@edit']);

Route::post('/estabelecimentos/alterar/{id}', ['as' => 'admin.estabelecimentos.update', 'uses' => 'EstabelecimentosController@update']);

Route::post('/estabelecimentos/salvar', ['as' => 'admin.estabelecimentos.store', 'uses' => 'EstabelecimentosController@store']);

Route::get('/estabelecimentos/excluir/{id}', ['as' => 'admin.estabelecimentos.destroy', 'uses' => 'EstabelecimentosController@destroy']);

Route::get('/estabelecimentos/email', ['as' => 'admin.estabelecimentos.email', 'uses' => 'EstabelecimentosController@email']);

//Ajax

Route::get('/ajax', function(){
    return view('admin.ajax.index');
});

Route::get('/post', 'EstabelecimentosController@ajax');

Route::get('/get', 'EstabelecimentosController@ajaxSelect');

//Fim Estabelecimentos

//Responsaveis

Route::get('/responsaveis', ['as' => 'admin.responsavel.index', 'uses' => 'ResponsavelController@index']);

Route::get('/responsaveis/novo', ['as' => 'admin.responsavel.create', 'uses' => 'ResponsavelController@create']);

Route::get('/responsaveis/editar/{id}', ['as' => 'admin.responsavel.edit', 'uses' => 'ResponsavelController@edit']);

Route::post('/responsaveis/alterar/{id}', ['as' => 'admin.responsavel.update', 'uses' => 'ResponsavelController@update']);

Route::post('/responsaveis/salvar', ['as' => 'admin.responsavel.store', 'uses' => 'ResponsavelController@store']);

Route::get('/responsaveis/excluir/{id}', ['as' => 'admin.responsavel.destroy', 'uses' => 'ResponsavelController@destroy']);

//Fim Responsaveis


// Shoppings

Route::get('/shoppings', ['as' => 'admin.shoppings.index', 'uses' => 'ShoppingController@index']);

Route::get('/shoppings/novo', ['as' => 'admin.shoppings.create', 'uses' => 'ShoppingController@create']);

Route::get('/shoppings/editar/{id}', ['as' => 'admin.shoppings.edit', 'uses' => 'ShoppingController@edit']);

Route::post('/shoppings/alterar/{id}', ['as' => 'admin.shoppings.update', 'uses' => 'ShoppingController@update']);

Route::post('/shoppings/salvar', ['as' => 'admin.shoppings.store', 'uses' => 'ShoppingController@store']);

Route::get('/shoppings/excluir/{id}', ['as' => 'admin.shoppings.destroy', 'uses' => 'ShoppingController@destroy']);

// Fim Shoppings

// Filme

Route::get('/filme', ['as' => 'admin.filme.index', 'uses' => 'FilmeController@index']);

Route::get('/filme/novo', ['as' => 'admin.filme.create', 'uses' => 'FilmeController@create']);

Route::get('/filme/editar/{id}', ['as' => 'admin.filme.edit', 'uses' => 'FilmeController@edit']);

Route::post('/filme/alterar/{id}', ['as' => 'admin.filme.update', 'uses' => 'FilmeController@update']);

Route::post('/filme/salvar', ['as' => 'admin.filme.store', 'uses' => 'FilmeController@store']);

Route::get('/filme/excluir/{id}', ['as' => 'admin.filme.destroy', 'uses' => 'FilmeController@destroy']);

// Fim Filme

// Sala

Route::get('/sala', ['as' => 'admin.sala.index', 'uses' => 'SalaController@index']);

Route::get('/sala/novo', ['as' => 'admin.sala.create', 'uses' => 'SalaController@create']);

Route::get('/sala/editar/{id}', ['as' => 'admin.sala.edit', 'uses' => 'SalaController@edit']);

Route::post('/sala/alterar/{id}', ['as' => 'admin.sala.update', 'uses' => 'SalaController@update']);

Route::post('/sala/salvar', ['as' => 'admin.sala.store', 'uses' => 'SalaController@store']);

Route::get('/sala/excluir/{id}', ['as' => 'admin.sala.destroy', 'uses' => 'SalaController@destroy']);

// Fim Sala

// Sessões

Route::get('/sessao', ['as' => 'admin.sessao.index', 'uses' => 'SalaController@indexSessao']);

Route::get('/sessao/novo', ['as' => 'admin.sessao.create', 'uses' => 'SalaController@createSessao']);

Route::get('/sessao/editar/{id}', ['as' => 'admin.sessao.edit', 'uses' => 'SalaController@editSessao']);

Route::post('/sessao/alterar/{id}', ['as' => 'admin.sessao.update', 'uses' => 'SalaController@updateSessao']);

Route::post('/sessao/salvar', ['as' => 'admin.sessao.store', 'uses' => 'SalaController@storeSessao']);

Route::get('/sessao/excluir/{id}', ['as' => 'admin.sessao.destroy', 'uses' => 'SalaController@destroySessao']);

Route::get('/ajaxSalas/{id}', 'SalaController@exibirSalasShoppings');
// Fim Sessões