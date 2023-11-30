<?php

namespace Cornatul\Articles\Crud;

use Illuminate\Database\Eloquent\Model;

interface CrudInterface
{

    public function all();

    public function find($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}