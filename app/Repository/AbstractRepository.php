<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): array
    {
        return $this->model::create($data)->toArray();
    }


    /**
     * @param int $limit
     * @param array $orderBy
     * @return mixed
     */
    public function findAll(int $limit = 10, array $orderBy = []): array
    {
        $results = $this->model::query();

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
     * @param int $id
     * @return mixed
     */
    public function find(int $id): array
    {
        return $this->model::findOrFail($id)->toArray();
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id): bool
    {
        return $this->model::find($id)->update($data) ? true : false;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model::destroy($id) ? true : false;
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
        $results = $this->model::where($fields[0], 'LIKE', '%' . $value . '%');

        if (count($fields) > 1) {
            for ($i = 1; $i < count($fields); $i++) {
                $results->orWhere($fields[$i], 'LIKE', '%' . $value . '%');
            }
        }

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
}
