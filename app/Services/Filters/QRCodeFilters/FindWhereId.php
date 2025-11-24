<?php

namespace App\Services\Filters\QRCodeFilters;

use App\Services\Filters\Constants\QrcodeConstants;
use App\Services\Filters\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class FindWhereId implements FilterContract, QrcodeConstants
{
    protected $itemId;

    public function __construct($itemId)
    {
        $this->itemId = $itemId;
    }

    public function apply(Builder $query)
    {
        return $query->where('id', $this->itemId);
    }
}
