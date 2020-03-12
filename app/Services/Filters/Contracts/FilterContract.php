<?php

namespace App\Services\Filters\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface FilterContract
{
    public function apply(Builder $query);
}
