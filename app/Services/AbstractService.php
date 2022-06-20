<?php

declare(strict_types=1);
namespace App\Services;

use App\Repository\RepositoryInterface;

/**
 * Class AbstractService
 * @package App\Services
 */
abstract class AbstractService implements ServiceInterface
{
    /**
     * @var RepositoryInterface
     */
    protected RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): array
    {
        return $this->repository->create($data);
    }

    /**
     * @param array $orderBy
     * @param int $limit
     * @return mixed
     */
    public function findAll(int $limit = 10, array $orderBy = []): array
    {
        return $this->repository->findAll($limit, $orderBy);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id): array
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id): bool{
        return $this->repository->update($data, $id) ? true : false;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool{
        return $this->repository->delete($id);
    }

    /**
     * @param array $fields
     * @param string $value
     * @param int $limit
     * @param array $orderBy
     * @return mixed
     */
    public function findBy(array $fields, string $value, int $limit = 10, array $orderBy = []): array
    {
        return $this->repository->findBy($fields, $value, $limit, $orderBy);
    }
}
