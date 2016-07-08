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

Route::get('get-nome-estabelecimento/{nome}', 'EstabelecimentosController@ajaxEstabelecimento');

//Fim Estabelecimentos

//Responsaveis

Route::get('/responsaveis', ['as' => 'admin.responsavel.index', 'uses' => 'ResponsavelController@index']);

Route::get('/responsaveis/novo', ['as' => 'admin.responsavel.create', 'uses' => 'ResponsavelController@create']);

Route::get('/responsaveis/editar/{id}', ['as' => 'admin.responsavel.edit', 'uses' => 'ResponsavelController@edit']);

Route::post('/responsaveis/alterar/{id}', ['as' => 'admin.responsavel.update', 'uses' => 'ResponsavelController@update']);

Route::post('/responsaveis/salvar', ['as' => 'admin.responsavel.store', 'uses' => 'ResponsavelController@store']);

Route::get('/responsaveis/excluir/{id}', ['as' => 'admin.responsavel.destroy', 'uses' => 'ResponsavelController@destroy']);

//Fim Responsaveis

Route::get('/ajax', function(){
    return view('admin.ajax.index');
});

Route::get('/post', function(){
    return view('admin.ajax.post');
});