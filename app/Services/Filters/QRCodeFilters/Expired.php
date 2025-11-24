<?php

namespace App\Services\Filters\QRCodeFilters;

use App\Services\Filters\Constants\QrcodeConstants;
use App\Services\Filters\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Expired implements FilterContract, QrcodeConstants
{
    public function apply(Builder $query)
    {
        return $query->where('status', self::STATUS['Expired']);
    }
}
