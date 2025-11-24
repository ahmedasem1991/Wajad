<?php

namespace App\Policies;

use App\Banner;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any banners.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('banners')) {
            return true;
        } else {
            return false;
        }
        // }
    }

    /**
     * Determine whether the user can view the banner.
     *
     * @return mixed
     */
    public function view(User $user, Banner $banner)
    {
        if ($user->hasPermissionTo('banners')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create banners.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('banners')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the banner.
     *
     * @return mixed
     */
    public function update(User $user, Banner $banner)
    {
        if ($user->hasPermissionTo('banners')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the banner.
     *
     * @return mixed
     */
    public function delete(User $user, Banner $banner)
    {
        if ($user->hasPermissionTo('banners')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the banner.
     *
     * @return mixed
     */
    public function restore(User $user, Banner $banner)
    {
        if ($user->hasPermissionTo('banners')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the banner.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Banner $banner)
    {
        if ($user->hasPermissionTo('banners')) {
            return true;
        } else {
            return false;
        }
    }
}
