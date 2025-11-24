<?php

namespace App\Services\Filters\QRCodeFilters;

use App\Services\Filters\Constants\QrcodeConstants;
use App\Services\Filters\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class MultiAssign implements FilterContract, QrcodeConstants
{
    public function apply(Builder $query)
    {
        return $query->where('type', self::TYPES['Multi Assign']);
    }
}
