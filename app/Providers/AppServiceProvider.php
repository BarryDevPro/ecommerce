<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Repositories\RepositoryInterface' ,'App\Http\Repositories\Repository');
        $this->app->bind('App\Http\Repositories\CategorieInterface' , 'App\Http\Repositories\CategorieRepository');
        $this->app->bind('App\Http\Repositories\ClientInterface'   ,  'App\Http\Repositories\ClientRepository');
        $this->app->bind('App\Http\Repositories\ProduitInterface' ,   'App\Http\Repositories\ProduitRepository');
        $this->app->bind('App\Http\Repositories\CommandeInterface'   ,  'App\Http\Repositories\CommandeRepository');
        $this->app->bind('App\Http\Repositories\DetailCommandeInterface' ,   'App\Http\Repositories\DetailCommandeRepository');
        $this->app->bind('App\Gestion\PhotoInterface' ,   'App\Gestion\Photo');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
