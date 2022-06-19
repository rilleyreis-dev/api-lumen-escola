<?php

declare(strict_types=1);
namespace App\Services\Classes;

use App\Services\AbstractService;

class ClassesService extends AbstractService
{
    /**
     * @param int $employeeId
     * @param int $limit
     * @param array $orderBy
     * @return array
     */
    public function findByEmployee(int $employeeId, int $limit = 10, array $orderBy = []): array
    {
        return $this->repository->findByEmployee($employeeId, $limit, $orderBy);
    }

    /**
     * @param string $value
     * @return array
     */
    public function findAllBy(string $value): array
    {
        return $this->repository->findAllBy($value);
    }

    /**
     * @param int $employeeId
     * @return bool
     */
    public function deleteByEmployee(int $employeeId): bool
    {
        return $this->repository->deleteByEmployee($employeeId);
    }
}
