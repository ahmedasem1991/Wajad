<?php

namespace App\Policies;

use App\Package;
use App\Subscription;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Package.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('subscription')) {
            return true;
        } else {
            return false;
        }
        //  }
    }

    /**
     * Determine whether the user can view the post.
     *
     * @return mixed
     */
    public function view(User $user, Subscription $Subscription)
    {

        // if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('subscription')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can create Package.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @return mixed
     */
    public function update(User $user, Subscription $Subscription)
    {
        //     if(Auth()->User()->isCorporateAdmin()){
        //         return  false;
        // }
        //     return  true;
        return false;
    }

    /**
     * Determine whether the user can delete the Package.
     *
     * @return mixed
     */
    public function delete(User $user, Subscription $Subscription)
    {
        //     if(Auth()->User()->isCorporateAdmin()){
        //         return  false;
        // }
        //     return  true;
        return false;
    }

    /**
     * Determine whether the user can restore the Package.
     *
     * @return mixed
     */
    public function restore(User $user, Subscription $Subscription)
    {
        // return  Auth()->User()->isAdmin() ? true :  false;
        return false;
    }

    /**
     * Determine whether the user can permanently delete the Package.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Subscription $Subscription)
    {
        // return  Auth()->User()->isAdmin() ? true :  false;
        return false;
    }
}
