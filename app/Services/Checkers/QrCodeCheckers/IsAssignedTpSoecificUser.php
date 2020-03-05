<?php

namespace App\Services\Checkers\QrCodeCheckers;

use App\Services\Checkers\Contracts\CheckerContract;

class IsAssignedTpSoecificUser implements CheckerContract
{
    /**
     * User Id
     *
     * @var int
     */
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

    public function checkFor($model)
    {
        return $model->user_id === $this->user_id;
    }
}
