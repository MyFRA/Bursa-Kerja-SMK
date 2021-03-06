<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';
    public const ADMIN = '/app-admin/dashboard';
    public const PERUSAHAAN = '/perusahaan';
    public const BERANDA = '/siswa/beranda';
    public const RESUME = '/siswa/create-resume/siswa-pendidikan';
    public const EMAILVERIFY = '/email/verify';
    public const PATH = '/';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapPerusahaanRoutes();

        $this->mapSiswaRoutes();

        $this->mapWebRoutes();

        //
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
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapPerusahaanRoutes()
    {
        Route::prefix('perusahaan')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/perusahaan.php'));
    }

    protected function mapSiswaRoutes()
    {
        Route::prefix('siswa')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/siswa.php'));
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
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
