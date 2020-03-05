<?php

namespace App\Services\Filters\ItemFilters;

use Illuminate\Database\Eloquent\Builder;
use App\Services\Filters\Contracts\FilterContract;

class Category implements FilterContract
{
    protected $category_id;

    public function __construct($category_id = null)
    {
        $this->category_id = $category_id;
    }

    public function apply(Builder $query)
    {
        return $query->where('category_id',  $this->category_id);
    }
}
