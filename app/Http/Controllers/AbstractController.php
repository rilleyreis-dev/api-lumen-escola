<?php

namespace App\Http\Controllers;

use App\Services\ServiceInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class AbstractController extends BaseController implements ControllerInterface
{
    /**
     * @var ServiceInterface
     */
    protected ServiceInterface $service;

    /**
     * @var array
     */
    protected array $searchFields = [];

    /**
     * AbstractController constructor.
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param array $data
     * @param int $status
     * @return array
     */
    protected function sucessResponse(array $data, int $status = Response::HTTP_OK): array
    {
        return [
            'status_code' => $status,
            'data' => $data
        ];
    }

    /**
     * @param Exception $e
     * @param int $status
     * @return array
     */
    protected function errorResponse(Exception $e, int $status = Response::HTTP_BAD_REQUEST): array
    {
        return [
            'status_code' => $status,
            'error' => true,
            'error_description' => $e->getMessage()
        ];
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        try {
            $result = $this->service->create($request->all());
            $response = $this->sucessResponse($result, Response::HTTP_CREATED);
        }catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findAll(Request $request): JsonResponse
    {
        try {
            $limit =(int) $request->get('limit', 10);
            $orderBy = $request->get('orderBy', []);
            $search = $request->get('q', '');
            if(!empty($search)) {
                $result = $this->service->findBy(
                    $this->searchFields,
                    $search,
                    $limit,
                    $orderBy
                );
            }else{
                $result = $this->service->findAll($limit, $orderBy);
            }
            $response = $this->sucessResponse($result, Response::HTTP_PARTIAL_CONTENT);
        }catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function find(Request $request, int $id): JsonResponse
    {
        try{
            $result = $this->service->find($id);
            $response = $this->sucessResponse($result);
        }catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try{
            $result['update_data'] = $this->service->update($request->all(), $id);
            $response = $this->sucessResponse($result);
        }catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

/**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function delete(Request $request, int $id): JsonResponse
    {
        try{
            $result['delete_data'] = $this->service->delete($id);
            $response = $this->sucessResponse($result);
        }catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }
}
