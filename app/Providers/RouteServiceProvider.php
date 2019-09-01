<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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

        $this->mapWebRoutes();

        $this->mapProdiPiRoutes();

        $this->mapProdiRoutes();

        $this->mapInternshipRoutes();

        $this->mapStudentRoutes();

        $this->mapLecturerRoutes();

        $this->mapStaffRoutes();

        //
    }

    /**
     * Define the "staff" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapStaffRoutes()
    {
        Route::group([
            'middleware' => ['web', 'staff', 'auth:staff'],
            'prefix' => 'staff',
            'as' => 'staff.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/staff.php');
        });
    }

    /**
     * Define the "lecturer" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapLecturerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'lecturer', 'auth:lecturer'],
            'prefix' => 'lecturer',
            'as' => 'lecturer.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/lecturer.php');
        });
    }

    /**
     * Define the "student" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapStudentRoutes()
    {
        Route::group([
            'middleware' => ['web', 'student', 'auth:student'],
            'prefix' => 'student',
            'as' => 'student.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/student.php');
        });
    }

    /**
     * Define the "internship" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapInternshipRoutes()
    {
        Route::group([
            'middleware' => ['web', 'internship', 'auth:internship'],
            'prefix' => 'internship',
            'as' => 'internship.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/internship.php');
        });
    }

    /**
     * Define the "prodi" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapProdiRoutes()
    {
        Route::group([
            'middleware' => ['web', 'prodi', 'auth:prodi'],
            'prefix' => 'prodi',
            'as' => 'prodi.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/prodi.php');
        });
    }

    /**
     * Define the "prodi_pi" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapProdiPiRoutes()
    {
        Route::group([
            'middleware' => ['web', 'prodi_pi', 'auth:prodi_pi'],
            'prefix' => 'prodi-pi',
            'as' => 'prodi-pi.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/prodi_pi.php');
        });
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
