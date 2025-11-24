<?php

namespace App\Services\Filters\ItemFilters;

use App\Services\Filters\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Model implements FilterContract
{
    protected $model_id;

    public function __construct($model_id = null)
    {
        $this->model_id = $model_id;
    }

    public function apply(Builder $query)
    {
        return $query->where('model_id', $this->model_id);
    }
}
