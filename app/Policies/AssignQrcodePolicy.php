<?php

namespace App\Policies;

use App\AssignQrcode;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignQrcodePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any qrcodes.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('view assign qr code')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the qrcode.
     *
     * @param  \App\AssignQrcode  $qrcode
     * @return mixed
     */
    public function view(User $user, AssignQrcode $AssignQrcode)
    {
        // if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('view assign qr code')) {
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
        // if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('create assign qr code')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can update the qrcode.
     *
     * @return mixed
     */
    public function update(User $user, AssignQrcode $AssignQrcode)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the qrcode.
     *
     * @return mixed
     */
    public function delete(User $user, AssignQrcode $AssignQrcode)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the qrcode.
     *
     * @return mixed
     */
    public function restore(User $user, AssignQrcode $AssignQrcode)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the qrcode.
     *
     * @return mixed
     */
    public function forceDelete(User $user, AssignQrcode $AssignQrcode)
    {
        return false;
    }
}
