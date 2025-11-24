<?php

namespace App\Policies;

use App\Qrcode;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\URL;

class QrcodePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any qrcodes.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('view stock')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the qrcode.
     *
     * @return mixed
     */
    public function view(User $user, Qrcode $qrcode)
    {
        // if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('view stock')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can create qrcodes.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the qrcode.
     *
     * @return mixed
     */
    public function update(User $user, Qrcode $qrcode)
    {
        $URL = URL::current();

        if (strstr($URL, 'expired-q-rcodes')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the qrcode.
     *
     * @return mixed
     */
    public function delete(User $user, Qrcode $qrcode)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            if ($user->hasPermissionTo('delete qr code')) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * Determine whether the user can restore the qrcode.
     *
     * @return mixed
     */
    public function restore(User $user, Qrcode $qrcode)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the qrcode.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Qrcode $qrcode)
    {
        return true;
    }
}
