<?php

namespace App\Services\Checkers\QrCodeCheckers;

use App\Services\Checkers\Contracts\CheckerContract;
use App\Services\Filters\Constants\QrcodeConstants;

class IsSingleAssign implements CheckerContract, QrcodeConstants
{
    public function checkFor($model)
    {
        return $model->type === self::TYPES['Single Assign'];
    }
}
