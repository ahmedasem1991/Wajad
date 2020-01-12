<?php

namespace App\Policies;

use App\User;
use App\Corporate;
use Illuminate\Auth\Access\HandlesAuthorization;

class CorporatePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any corporates.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if(Auth()->User()->isAdmin()){
            if($user->hasPermissionTo('corporates'))
            {
                return true;
            }else{
                return false;
            }
   }
    }

    /**
     * Determine whether the user can view the corporate.
     *
     * @param  \App\User  $user
     * @param  \App\Corporate  $corporate
     * @return mixed
     */
    public function view(User $user, Corporate $corporate)
    {
        return true;
    }

    /**
     * Determine whether the user can create corporates.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return true;
    }

    /**
     * Determine whether the user can update the corporate.
     *
     * @param  \App\User  $user
     * @param  \App\Corporate  $corporate
     * @return mixed
     */
    public function update(User $user, Corporate $corporate)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the corporate.
     *
     * @param  \App\User  $user
     * @param  \App\Corporate  $corporate
     * @return mixed
     */
    public function delete(User $user, Corporate $corporate)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the corporate.
     *
     * @param  \App\User  $user
     * @param  \App\Corporate  $corporate
     * @return mixed
     */
    public function restore(User $user, Corporate $corporate)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the corporate.
     *
     * @param  \App\User  $user
     * @param  \App\Corporate  $corporate
     * @return mixed
     */
    public function forceDelete(User $user, Corporate $corporate)
    {
        return true;
    }
}
