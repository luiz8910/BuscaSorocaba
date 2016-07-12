<?php

namespace BuscaSorocaba\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('BuscaSorocaba\Repositories\UserRepository',
            'BuscaSorocaba\Repositories\UserRepositoryEloquent');

        $this->app->bind('BuscaSorocaba\Repositories\CategoriaRepository',
            'BuscaSorocaba\Repositories\CategoriaRepositoryEloquent');

        $this->app->bind('BuscaSorocaba\Repositories\SubCategoriaRepository',
            'BuscaSorocaba\Repositories\SubCategoriaRepositoryEloquent');

        $this->app->bind('BuscaSorocaba\Repositories\EstabelecimentosRepository',
            'BuscaSorocaba\Repositories\EstabelecimentosRepositoryEloquent');

        $this->app->bind('BuscaSorocaba\Repositories\ResponsavelRepository',
            'BuscaSorocaba\Repositories\ResponsavelRepositoryEloquent');

        $this->app->bind('BuscaSorocaba\Repositories\AvaliacaoRepository',
            'BuscaSorocaba\Repositories\AvaliacaoRepositoryEloquent');

        $this->app->bind('BuscaSorocaba\Repositories\ShoppingRepository',
            'BuscaSorocaba\Repositories\ShoppingRepositoryEloquent');

        $this->app->bind('BuscaSorocaba\Repositories\FilmeRepository',
            'BuscaSorocaba\Repositories\FilmeRepositoryEloquent');

        $this->app->bind('BuscaSorocaba\Repositories\SalaRepository',
            'BuscaSorocaba\Repositories\SalaRepositoryEloquent');
    }
}

