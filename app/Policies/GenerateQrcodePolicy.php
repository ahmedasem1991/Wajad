<?php

namespace App\Policies;

use App\User;
use App\GenerateQrcode;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenerateQrcodePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any qrcodes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if($user->hasPermissionTo('view generate qr code'))
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can view the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\GenerateQrcode  $qrcode
     * @return mixed
     */
    public function view(User $user, GenerateQrcode $GenerateQrcode)
    {
        if($user->hasPermissionTo('view generate qr code'))
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create qrcodes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->hasPermissionTo('create generate qr code'))
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\Qrcode  $qrcode
     * @return mixed
     */
    public function update(User $user, GenerateQrcode $qrcode)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\Qrcode  $qrcode
     * @return mixed
     */
    public function delete(User $user, GenerateQrcode $qrcode)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\Qrcode  $qrcode
     * @return mixed
     */
    public function restore(User $user, GenerateQrcode $qrcode)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\Qrcode  $qrcode
     * @return mixed
     */
    public function forceDelete(User $user, GenerateQrcode $qrcode)
    {
        return false;
    }
}
