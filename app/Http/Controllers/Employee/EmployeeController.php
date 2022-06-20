<?php

declare(strict_types=1);
namespace App\Http\Controllers\Employee;

use App\Http\Controllers\AbstractController;
use App\Services\Employee\EmployeeService;
use App\Services\ServiceInterface;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\Employee
 */
class EmployeeController extends AbstractController
{
    /**
     * @var array|string[]
     */
    protected array $searchFields = [
        'name',
    ];

    /**
     * EmployeeController constructor.
     * @param EmployeeService $service
     * @return void
     */
    public function __construct(EmployeeService $service)
    {
        parent::__construct($service);
    }
}
