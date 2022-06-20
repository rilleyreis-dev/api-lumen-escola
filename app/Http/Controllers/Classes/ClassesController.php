<?php

declare(strict_types=1);
namespace App\Http\Controllers\Classes;

use App\Http\Controllers\AbstractController;
use App\Services\Classes\ClassesService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ClassesController
 * @package App\Http\Controllers\Classes
 */
class ClassesController extends AbstractController
{
    /**
     * @var array|string[]
     */
    protected array $searchFields = [
        'name',
    ];

    /**
     * ClassesController constructor.
     * @param ClassesService $service
     */
    public function __construct(ClassesService $service)
    {
        parent::__construct($service);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findByEmployee(Request $request, int $employee): JsonResponse
    {
        try {
            $limit = $request->get('limit', 10);
            $orderBy = $request->get('orderBy', []);
            $results = $this->service->findByEmployee($employee, $limit, $orderBy);
            $response = $this->successResponse($results, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e->getMessage());
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findAllBy(Request $request, string $value): JsonResponse
    {
        try {
            $results = $this->service->findAllBy($value);
            $response = $this->sucessResponse($results, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e->getMessage());
        }

        return response()->json($response, $response['status_code']);
    }

}
