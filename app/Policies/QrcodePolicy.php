<?php

namespace App\Policies;

use App\User;
use App\Qrcode;
use Illuminate\Auth\Access\HandlesAuthorization;

class QrcodePolicy
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
       return true;
    }

    /**
     * Determine whether the user can view the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\Qrcode  $qrcode
     * @return mixed
     */
    public function view(User $user, Qrcode $qrcode)
    {
        return true;
    }

    /**
     * Determine whether the user can create qrcodes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\Qrcode  $qrcode
     * @return mixed
     */
    public function update(User $user, Qrcode $qrcode)
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
    public function delete(User $user, Qrcode $qrcode)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\Qrcode  $qrcode
     * @return mixed
     */
    public function restore(User $user, Qrcode $qrcode)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the qrcode.
     *
     * @param  \App\User  $user
     * @param  \App\Qrcode  $qrcode
     * @return mixed
     */
    public function forceDelete(User $user, Qrcode $qrcode)
    {
        return true;
    }
}
