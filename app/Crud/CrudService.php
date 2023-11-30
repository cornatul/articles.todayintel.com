<?php

namespace Cornatul\Articles\Crud;

use Illuminate\Database\Eloquent\Model;
/**
 * Class CrudService
 * @package Cornatul\Articles\Crud
 * @property Model $model
 * @method Model findOrFail($id)

 */
class CrudService implements CrudInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    final public function all()
    {
        return $this->model->all();
    }

    final public function find($id)
    {
        return $this->model->find($id);
    }

    final public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    final public function update($id, array $attributes)
    {
        $record = $this->model->findOrFail($id);
        $record->update($attributes);
        return $record;
    }

    final public function delete($id)
    {
        $record = $this->model->findOrFail($id);
        $record->delete();
    }
}