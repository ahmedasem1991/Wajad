<?php

namespace App\Services\Filters\ItemFilters;

use App\Services\Filters\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Category implements FilterContract
{
    protected $category_id;

    public function __construct($category_id = null)
    {
        $this->category_id = $category_id;
    }

    public function apply(Builder $query)
    {
        return $query->where('category_id', $this->category_id);
    }
}
