<?php

namespace App\Services\Filters\ItemFilters;

use App\Services\Filters\Constants\ItemConstants;
use App\Services\Filters\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Lost implements FilterContract, ItemConstants
{
    public function apply(Builder $query)
    {
        return $query->where('status', self::STATUS['lost']);
    }
}
