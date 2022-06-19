<?php

declare(strict_types=1);
namespace App\Services;

/**
 * Interface ServiceInterface
 * @package App\Services
 */
interface ServiceInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): array;

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function findAll(int $limit = 10, array $orderBy = []): array;

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id): array;

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;


    /**
     * @param array $fields
     * @param string $value
     * @param int $limit
     * @param array $orderBy
     * @return mixed
     */
    public function findBy(array $fields, string $value, int $limit = 10, array $orderBy = []): array;
}
