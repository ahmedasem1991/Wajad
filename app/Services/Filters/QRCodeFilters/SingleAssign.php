<?php

namespace App\Services\Filters\QRCodeFilters;

use Illuminate\Database\Eloquent\Builder;
use App\Services\Filters\Contracts\FilterContract;
use App\Services\Filters\Constants\QrcodeConstants;

class SingleAssign implements FilterContract, QrcodeConstants
{
    public function apply(Builder $query)
    {
        return $query->where('type', self::TYPES['Single Assign']);
    }
}
