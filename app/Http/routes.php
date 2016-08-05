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
    return redirect('categoria');
});


Route::group(['middleware' => 'auth.checkrole:admin'], function(){

    //Categorias

    Route::get('/categoria', ['as' => 'admin.categoria.index', 'uses' => 'CategoriaController@index']);

    Route::get('/categoria/novo', ['as' => 'admin.categoria.create', 'uses' => 'CategoriaController@create']);

    Route::get('/categoria/editar/{id}', ['as' => 'admin.categoria.edit', 'uses' => 'CategoriaController@edit']);

    Route::get('/categoria/alterar/{id}',  'CategoriaController@update');

    Route::get('/categoria/salvar', ['as' => 'admin.categoria.store', 'uses' => 'CategoriaController@store']);

    Route::get('/categoria/excluir/{id}', ['as' => 'admin.categoria.destroy', 'uses' => 'CategoriaController@destroy']);

//Fim Categorias

//Sub Categorias

    Route::get('/subCategoria', ['as' => 'admin.subcategoria.index', 'uses' => 'SubCategoriaController@index']);

    Route::get('/subCategoria/novo', ['as' => 'admin.subcategoria.create', 'uses' => 'SubCategoriaController@create']);

    Route::get('/subCategoria/editar/{id}', ['as' => 'admin.subcategoria.edit', 'uses' => 'SubCategoriaController@edit']);

    Route::get('/subCategoria/alterar/{id}', ['as' => 'admin.subcategoria.update', 'uses' => 'SubCategoriaController@update']);

    Route::get('/subCategoria/salvar', ['as' => 'admin.subcategoria.store', 'uses' => 'SubCategoriaController@store']);

    Route::get('/subCategoria/excluir/{id}', ['as' => 'admin.subcategoria.destroy', 'uses' => 'SubCategoriaController@destroy']);

//Fim Sub Categorias

//Estabelecimentos

    Route::get('/estabelecimentos', ['as' => 'admin.estabelecimentos.index', 'uses' => 'EstabelecimentosController@index']);

    Route::get('/estabelecimentos/novo', ['as' => 'admin.estabelecimentos.create', 'uses' => 'EstabelecimentosController@create']);

    Route::get('/estabelecimentos/editar/{id}', ['as' => 'admin.estabelecimentos.edit', 'uses' => 'EstabelecimentosController@edit']);

    Route::get('/estabelecimentos/alterar/{id}', ['as' => 'admin.estabelecimentos.update', 'uses' => 'EstabelecimentosController@update']);

    Route::get('/estabelecimentos/salvar', ['as' => 'admin.estabelecimentos.store', 'uses' => 'EstabelecimentosController@store']);

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

    Route::get('/shoppings/alterar/{id}', ['as' => 'admin.shoppings.update', 'uses' => 'ShoppingController@update']);

    Route::get('/shoppings/salvar', ['as' => 'admin.shoppings.store', 'uses' => 'ShoppingController@store']);

    Route::get('/shoppings/excluir/{id}', ['as' => 'admin.shoppings.destroy', 'uses' => 'ShoppingController@destroy']);

// Fim Shoppings

// Filme

    Route::get('/filme', ['as' => 'admin.filme.index', 'uses' => 'FilmeController@index']);

    Route::get('/filme/novo', ['as' => 'admin.filme.create', 'uses' => 'FilmeController@create']);

    Route::get('/filme/editar/{id}', ['as' => 'admin.filme.edit', 'uses' => 'FilmeController@edit']);

    Route::get('/filme/alterar/{id}', ['as' => 'admin.filme.update', 'uses' => 'FilmeController@update']);

    Route::get('/filme/salvar', ['as' => 'admin.filme.store', 'uses' => 'FilmeController@store']);

    Route::get('/filme/excluir/{id}', ['as' => 'admin.filme.destroy', 'uses' => 'FilmeController@destroy']);

// Fim Filme

// Sala

    Route::get('/sala', ['as' => 'admin.sala.index', 'uses' => 'SalaController@index']);

    Route::get('/sala/novo', ['as' => 'admin.sala.create', 'uses' => 'SalaController@create']);

    Route::get('/sala/editar/{id}', ['as' => 'admin.sala.edit', 'uses' => 'SalaController@edit']);

    Route::get('/sala/alterar/{id}', ['as' => 'admin.sala.update', 'uses' => 'SalaController@update']);

    Route::get('/sala/salvar', ['as' => 'admin.sala.store', 'uses' => 'SalaController@store']);

    Route::get('/sala/excluir/{id}', ['as' => 'admin.sala.destroy', 'uses' => 'SalaController@destroy']);

    Route::get('/salaAjax/{id}', 'SalaController@ajaxSala');

// Fim Sala

// Sessões

    Route::get('/sessao', ['as' => 'admin.sessao.index', 'uses' => 'SessaoController@index']);

    Route::get('/sessao/novo', ['as' => 'admin.sessao.create', 'uses' => 'SessaoController@create']);

    Route::get('/sessao/editar/{id}', ['as' => 'admin.sessao.edit', 'uses' => 'SessaoController@edit']);

    Route::post('/sessao/alterar/{id}', ['as' => 'admin.sessao.update', 'uses' => 'SessaoController@update']);

    Route::post('/sessao/salvar', ['as' => 'admin.sessao.store', 'uses' => 'SessaoController@store']);

    Route::get('/sessao/excluir/{id}', ['as' => 'admin.sessao.destroy', 'uses' => 'SessaoController@destroy']);

    Route::get('/ajaxSalas/{id}', 'SessaoController@exibirSalasShoppings');

// Fim Sessões
});

Route::group(['middleware' => 'cors'], function(){
    Route::post('oauth/access_token', function () {
        return Response::json(Authorizer::issueAccessToken());
    });

    Route::group(['prefix' => 'api', 'middleware' => 'oauth', 'as' => 'api'], function(){

        Route::group(['prefix' => 'estabelecimentos', 'middleware' => 'oauth.checkrole:client', 'as' => 'pedidos'], function(){

            //Consulta lista de Subcategorias 24 horas
            Route::resource('24h', 'Api\Subcategoria\SubCategoriaController@vinteQuatro');

            //Consulta lista de Subcategorias de Emergencia
            Route::resource('emergencia', 'Api\Subcategoria\SubCategoriaController@emergencia');

            //Consulta Perfil do estabelecimento
            Route::resource('perfil', 'Api\Estabelecimentos\EstabelecimentosController@show');

            //Consulta Lista de Estabelecimentos com base na subcategoria selecionada
            Route::resource('comercio', 'Api\Estabelecimentos\EstabelecimentosController@index');

            //Consulta lista de Estabelecimentos 24h com base na subcategoria selecionada
            Route::resource('estab24', 'Api\Estabelecimentos\EstabelecimentosController@vinteQuatro');

            //Consulta lista de Estabelecimentos de emergência com base na subcategoria selecionada
            Route::resource('estabEmergencia', 'Api\Estabelecimentos\EstabelecimentosController@emergencia');

            Route::resource('sessaoApi', 'Api\Sessao\SessaoController@index');

            //Consulta lista de Subcategorias de alimentação
            Route::resource('subcategoriaApi', 'Api\Subcategoria\SubCategoriaController@index');
        });

    });
});

