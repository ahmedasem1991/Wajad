<?php

namespace App\Services\Filters\ItemFilters;

use App\Services\Filters\Constants\ItemConstants;
use App\Services\Filters\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Found implements FilterContract, ItemConstants
{
    public function apply(Builder $query)
    {
        return $query->where('status', self::STATUS['found']);
    }
}
