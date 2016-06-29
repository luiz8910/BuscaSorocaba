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

//Sub Categorias

Route::get('/subCategoria', ['as' => 'admin.subcategoria.index', 'uses' => 'SubCategoriaController@index']);

Route::get('/subCategoria/novo', ['as' => 'admin.subcategoria.create', 'uses' => 'SubCategoriaController@create']);

Route::get('/subCategoria/editar/{id}', ['as' => 'admin.subcategoria.edit', 'uses' => 'SubCategoriaController@edit']);

Route::post('/subCategoria/alterar/{id}', ['as' => 'admin.subcategoria.update', 'uses' => 'SubCategoriaController@update']);

Route::post('/subCategoria/salvar', ['as' => 'admin.subcategoria.store', 'uses' => 'SubCategoriaController@store']);

Route::get('/subCategoria/excluir/{id}', ['as' => 'admin.subcategoria.destroy', 'uses' => 'SubCategoriaController@destroy']);

//Estabelecimentos

Route::get('/estabelecimentos', ['as' => 'admin.estabelecimentos.index', 'uses' => 'EstabelecimentosController@index']);

Route::get('/estabelecimentos/novo', ['as' => 'admin.estabelecimentos.create', 'uses' => 'EstabelecimentosController@create']);

Route::get('/estabelecimentos/editar/{id}', ['as' => 'admin.estabelecimentos.edit', 'uses' => 'EstabelecimentosController@edit']);

Route::post('/estabelecimentos/alterar/{id}', ['as' => 'admin.estabelecimentos.update', 'uses' => 'EstabelecimentosController@update']);

Route::post('/estabelecimentos/salvar', ['as' => 'admin.estabelecimentos.store', 'uses' => 'EstabelecimentosController@store']);

Route::get('/estabelecimentos/excluir/{id}', ['as' => 'admin.estabelecimentos.destroy', 'uses' => 'EstabelecimentosController@destroy']);
