<?php

namespace App\Services\Checkers\Contracts;

use Illuminate\Database\Eloquent\Model;

interface CheckerContract
{
    public function checkFor(Model $model);
}
