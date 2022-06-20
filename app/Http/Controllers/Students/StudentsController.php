<?php

declare(strict_types=1);
namespace App\Http\Controllers\Students;

use App\Http\Controllers\AbstractController;
use App\Services\Students\StudentsService;

/**
 * Class StudentsController
 * @package App\Http\Controllers\Students
 */
class StudentsController extends AbstractController
{
    /**
     * @var array|string[]
     */
    protected array $searchFields = [
        'name',
    ];

    /**
     * StudentsController constructor.
     * @param StudentsService $service
     *
     * @return void
     */
    public function __construct(StudentsService $service){
        parent::__construct($service);
    }

}
