<?php

namespace App\Services\Filters\ItemFilters;

use Illuminate\Database\Eloquent\Builder;
use App\Services\Filters\Contracts\FilterContract;

class Color implements FilterContract
{
    protected $color_id;

    public function __construct($color_id = null)
    {
        $this->color_id = $color_id;
    }

    public function apply(Builder $query)
    {
        return $query->where('color_id',  $this->color_id);
    }
}
