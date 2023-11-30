<?php

namespace Cornatul\Articles\Search;

use Illuminate\Database\Eloquent\Model;

interface SearchInterface
{
    public function search(string $column, string $what): Model;
    public function exists(string $column, string $what): bool;
}