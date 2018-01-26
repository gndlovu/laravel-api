<?php

namespace gndlovu\LaravelApi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class LaravelApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'laravel_api');

        $this->setupRoutes($this->app->router);

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/laravel_api'),
        ], 'public');

        $this->app->router->pushMiddlewareToGroup('api', '\gndlovu\LaravelApi\Http\Middleware\CorsMiddleware');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Collective\Html\HtmlServiceProvider');

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Html', 'Collective\Html\HtmlFacade');
        $loader->alias('Form', 'Collective\Html\FormFacade');
    }

    public function setupRoutes(Router $router)
    {
        if (!$this->app->routesAreCached())
        {
            require __DIR__.'/routes/web.php';
            require __DIR__.'/routes/api.php';
        }
    }
}
