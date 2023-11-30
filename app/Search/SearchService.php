<?php

namespace Cornatul\Articles\Search;

use Illuminate\Database\Eloquent\Model;

class SearchService implements SearchInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    final public function search(string $column, string $what): Model
    {
        return $this->model->where($column, $what)->firstOrFail();
    }

    final public function exists(string $column, string $what): bool
    {
        return $this->model->where($column, $what)->exists();
    }

}