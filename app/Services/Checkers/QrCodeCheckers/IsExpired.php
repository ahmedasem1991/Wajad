<?php

namespace App\Services\Checkers\QrCodeCheckers;

use App\Services\Filters\Constants\QrcodeConstants;
use App\Services\Checkers\Contracts\CheckerContract;

class IsExpired implements CheckerContract, QrcodeConstants
{
    public function checkFor($model)
    {
        return $model->status === self::STATUS['Expired'];
    }
}
