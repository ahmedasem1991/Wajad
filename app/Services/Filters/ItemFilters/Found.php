<?php

namespace App\Services\Filters\ItemFilters;

use Illuminate\Database\Eloquent\Builder;
use App\Services\Filters\Constants\ItemConstants;
use App\Services\Filters\Contracts\FilterContract;

class Found implements FilterContract, ItemConstants
{
    public function apply(Builder $query)
    {
        return $query->where('status', self::STATUS['found']);
    }
}
