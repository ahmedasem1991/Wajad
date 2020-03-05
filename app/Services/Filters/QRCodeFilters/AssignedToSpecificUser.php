<?php

namespace App\Services\Filters\QRCodeFilters;

use Illuminate\Database\Eloquent\Builder;
use App\Services\Filters\Contracts\FilterContract;
use App\Services\Filters\Constants\QrcodeConstants;

class AssignedToSpecificUser implements FilterContract, QrcodeConstants
{
    protected $user_id;

    /**
     * Construct Assigned To Specific User
     *
     * @param int|null $user_id default will be auth('api')->user()->id
     */
    public function __construct($user_id = null)
    {
        $this->user_id = is_null($user_id) ? auth('api')->user()->id : $user_id;
    }

    public function apply(Builder $query)
    {
        return $query->where('user_id', $this->user_id);
    }
}
