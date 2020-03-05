<?php

namespace App\Services\Checkers\QrCodeCheckers;

use App\Services\Checkers\Contracts\CheckerContract;
use App\Services\Filters\Constants\QrcodeConstants;

class IsMultiAssigned implements CheckerContract, QrcodeConstants
{
    public function checkFor()
    {
        return $this->status === self::TYPES['Multi Assign'];
    }
}
