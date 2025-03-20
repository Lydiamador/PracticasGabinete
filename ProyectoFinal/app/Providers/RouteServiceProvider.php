<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * El namespace para las rutas.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Registra los servicios del proveedor.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Define las rutas para la aplicación.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define las rutas para la API.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define las rutas para la web.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}
