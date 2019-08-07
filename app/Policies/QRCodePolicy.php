<?php

namespace App\Policies;

use App\User;
use App\Qrcodes;
use Illuminate\Auth\Access\HandlesAuthorization;

class QRCodePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

  
}
