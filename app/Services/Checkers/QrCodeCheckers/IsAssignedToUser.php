<?php

namespace App\Services\Checkers\QrCodeCheckers;

use App\Services\Checkers\Contracts\CheckerContract;

class IsAssignedToUser implements CheckerContract
{
    public function checkFor($model)
    {
        return (bool) $model->user_id;
    }
}
