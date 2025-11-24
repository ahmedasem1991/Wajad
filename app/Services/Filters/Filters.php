<?php

namespace App\Services\Filters;

use Illuminate\Database\Eloquent\Builder;

trait Filters
{
    public function array_flatten($array)
    {
        $return = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $return = array_merge($return, array_flatten($value));
            } else {
                $return[$key] = $value;
            }
        }

        return $return;
    }

    public function scopeWithFilters(Builder $query, ...$filters)
    {
        foreach ($this->array_flatten($filters) as $filter) {
            $filter->apply($query);
        }
    }
}
