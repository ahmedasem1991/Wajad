<?php

namespace App\Policies;

use App\User;
use App\Package;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any Package.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Package  $Package
     * @return mixed
     */
    public function view(User $user, Package $Package)
    {
       
        if(Auth()->User()->isCorporateAdmin()){
            if($user->hasPermissionTo('packages'))
            {
                return true;
            }else{
                return false;
            }
        }
        return  true;
    }

    /**
     * Determine whether the user can create Package.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if(Auth()->User()->isCorporateAdmin()){
            return  false;
    }
        return  true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Package  $Package
     * @return mixed
     */
    public function update(User $user, Package $Package)
    {
        if(Auth()->User()->isCorporateAdmin()){
            return  false;
    }
        return  true;
    }

    /**
     * Determine whether the user can delete the Package.
     *
     * @param  \App\User  $user
     * @param  \App\Package  $Package
     * @return mixed
     */
    public function delete(User $user, Package $Package)
    {
        if(Auth()->User()->isCorporateAdmin()){
            return  false;
    }
        return  true;
    }

    /**
     * Determine whether the user can restore the Package.
     *
     * @param  \App\User  $user
     * @param  \App\Package  $Package
     * @return mixed
     */
    public function restore(User $user, Package $Package)
    {
        return  Auth()->User()->isAdmin() ? true :  false;
    }

    /**
     * Determine whether the user can permanently delete the Package.
     *
     * @param  \App\User  $user
     * @param  \App\Package  $Package
     * @return mixed
     */
    public function forceDelete(User $user, Package $Package)
    {
        return  Auth()->User()->isAdmin() ? true :  false;
    }
}
