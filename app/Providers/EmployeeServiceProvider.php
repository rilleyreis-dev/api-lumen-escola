<?php

declare(strict_types=1);
namespace App\Providers;

use App\Models\Employee\Employee;
use App\Repository\Employee\EmployeeRepository;
use App\Services\Employee\EmployeeService;
use Illuminate\Support\ServiceProvider;

/**
 * Class EmployeeServiceProvider
 * @package App\Providers
 */
class EmployeeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(EmployeeService::class, function ($app){
            return new EmployeeService(new EmployeeRepository(new Employee()));
        });
    }

    protected $namespace = 'Employee';
}
