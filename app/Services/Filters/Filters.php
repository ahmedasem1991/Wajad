<?php

namespace App\Services\Filters;

use Illuminate\Database\Eloquent\Builder;

trait Filters
{
    public function scopeWithFilters(Builder $query, ...$filters)
    {
        foreach (array_flatten($filters) as $filter) {
            $filter->apply($query);
        }
    }
}
