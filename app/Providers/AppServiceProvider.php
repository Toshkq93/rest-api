<?php

namespace App\Providers;

use App\Contracts\Repositories\Departments\iDepartmentRepository;
use App\Contracts\Repositories\Employees\iEmployeeRepository;
use App\Contracts\Services\Departments\iDepartmentsService;
use App\Contracts\Services\Employees\iEmployeeService;
use App\Repositories\Departments\DepartmentRepository;
use App\Repositories\Employees\EmployeeRepository;
use App\Services\Departments\DepartmentService;
use App\Services\Employees\EmployeeService;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindDI();
    }

    public function bindDI()
    {
        $this->app->bind(iEmployeeRepository::class, EmployeeRepository::class);
        $this->app->bind(iDepartmentRepository::class, DepartmentRepository::class);
        $this->app->bind(iEmployeeService::class, EmployeeService::class);
        $this->app->bind(iDepartmentsService::class, DepartmentService::class);
    }
}
