<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $repositories = ['User', 'Role', 'Permission', 'Location', 'TypeService', 'Status'];

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->setFacadesRepositories();
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->registerRepositories();
    }

    /**
     * register repositories class dependency.
     * example change drive to call method only change.
     */
    private function registerRepositories()
    {
        // $this->app->bind(
        //     'App\Repositories\Contracts\ProductRepositoryInterface',
        //     use 'App\Repositories\FirstOptionProductRepository' or 'App\Repositories\SecondOptionProductRepository'
        //      both of them implements ProductRepositoryInterface
        // );
        foreach ($this->repositories as $repository) {
            $this->app->bindIf(
                "App\\Repositories\\Contracts\\${repository}Interface",
                "App\\Repositories\\${repository}Repository"
            );
        }
    }

    /**
     * set Facade for repositories without implement instants container.
     */
    private function setFacadesRepositories()
    {
        foreach ($this->repositories as $repository) {
            $this->app->alias(
                "${repository}Repository",
                "App\\Repositories\\Facades\\${repository}Repository"
            );
        }
    }
}
