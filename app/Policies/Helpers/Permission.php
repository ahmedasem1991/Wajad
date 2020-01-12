<?php

namespace App\Policies\Helpers;

use App\User;

trait Permission
{
    public function permission(User $user)
    {
        if (Auth()->User()->isAdmin()) {
            return $user->hasPermissionTo($this->permission);
        }
    }
}
