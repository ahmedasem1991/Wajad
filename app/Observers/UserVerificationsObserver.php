<?php

namespace App\Observers;

use App\UserVerifications;

class UserVerificationsObserver
{
    public function saving(UserVerifications $userVerifications)
    {
        $userVerifications->expire_at = now()->addSeconds(60);
    }
}
