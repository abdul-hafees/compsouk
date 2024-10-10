<?php

namespace App\Admin\Providers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    const HOME = 'admin.orders.index';

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Admin\Http\Controllers';

    /**
     *
     * @var string
     */
    protected $name = 'admin';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapRoutes();

        View::addNamespace($this->name, __DIR__ . '/../Resources/views');
        Lang::addNamespace($this->name, __DIR__ . '/../Resources/lang');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function mapRoutes()
    {
        $this->routeRegistrar()->group(function () {
            $this->mapApiRoutes();

            $this->mapWebRoutes();
        });
    }

    public function routeRegistrar()
    {
        if (config('app.use_sub_domain', false) === true) {
            return Route::domain($this->name . '.' . config('app.domain'));
        }

        return Route::prefix($this->name);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::name($this->name . '.')
            ->middleware('web')
//            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/web.php');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->name($this->name . '.api.')
            ->middleware('api')
//            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/api.php');
    }

}
