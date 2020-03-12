<?php

namespace App\Services\Filters\QRCodeFilters;

use Illuminate\Database\Eloquent\Builder;
use App\Services\Filters\Contracts\FilterContract;
use App\Services\Filters\Constants\QrcodeConstants;

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
