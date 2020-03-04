<?php

namespace App\Services\Filters;

trait Filters
{
    public function withFilters(array $filters)
    {
        foreach ($filters as $filter) {
            $filter->apply($this->query());
        }
    }
}
