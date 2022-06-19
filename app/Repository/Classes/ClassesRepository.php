<?php

declare(strict_types=1);

namespace App\Repository\Classes;
use App\Repository\AbstractRepository;

/**
 * Class ClassesRepository
 * @package App\Repository\Classes
 */
class ClassesRepository extends AbstractRepository
{
    /**
     * @param int $employeeId
     * @param int $limit
     * @param array $orderBy
     * @return mixed
     */
    public function findByEmployee(int $employeeId, int $limit = 10, array $orderBy = []): array
    {
        $results = $this->model::where('employee_id', $employeeId);

        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }
            $results->orderBy($key, $value);
        }

        return $results->paginate($limit)
            ->appends(['order_by' => implode(',', array_keys($orderBy)),
                'limit' => $limit
            ])->toArray();
    }

    /**
     * @param string $value
     * @return mixed
     */
    public function findAllBy(string $value): array
    {
        $query = $this->model::query();

        if(is_numeric($value)) {
            $classes = $query->findOrFail($value);
        } else {
            $classes = $query->where('name', $value)->get();
        }
        return $classes->toArray();
    }

    /**
     * @param int $employeeId
     * @return bool
     */
    public function deleteByEmployee(int $employeeId): bool
    {
        return $this->model::where('employee_id', $employeeId)->delete() ? true : false;
    }
}
