<?php

namespace App\Policies;

use App\User;
use App\Support;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any supports.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if(Auth()->User()->isAdmin()){
            if($user->hasPermissionTo('support'))
            {
                return true;
            }else{
                return false;
            }
   }
    }

    /**
     * Determine whether the user can view the support.
     *
     * @param  \App\User  $user
     * @param  \App\Support  $support
     * @return mixed
     */
    public function view(User $user, Support $support)
    {
        //
    }

    /**
     * Determine whether the user can create supports.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the support.
     *
     * @param  \App\User  $user
     * @param  \App\Support  $support
     * @return mixed
     */
    public function update(User $user, Support $support)
    {
        //
    }

    /**
     * Determine whether the user can delete the support.
     *
     * @param  \App\User  $user
     * @param  \App\Support  $support
     * @return mixed
     */
    public function delete(User $user, Support $support)
    {
        //
    }

    /**
     * Determine whether the user can restore the support.
     *
     * @param  \App\User  $user
     * @param  \App\Support  $support
     * @return mixed
     */
    public function restore(User $user, Support $support)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the support.
     *
     * @param  \App\User  $user
     * @param  \App\Support  $support
     * @return mixed
     */
    public function forceDelete(User $user, Support $support)
    {
        //
    }
}
