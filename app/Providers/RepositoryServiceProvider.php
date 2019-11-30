<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Employee\EmployeeRepositoryInterface',
            'App\Repositories\Employee\EmployeeRepository'
        );

        $this->app->bind(
            'App\Repositories\Department\DepartmentRepositoryInterface',
            'App\Repositories\Department\DepartmentRepository'
        );
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
