<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentProduitRepository;
use App\Repositories\Interfaces\ProduitRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public $singletons = [ProduitRepositoryInterface::class => EloquentProduitRepository::class,];

    public function register()
    {
        $this->app->singleton(ProduitRepositoryInterface::class, function ($app) {
            return new EloquentProduitRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
