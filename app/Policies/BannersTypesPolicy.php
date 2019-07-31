<?php

namespace App\Policies;

use App\User;
use App\BannerTypes;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannersTypesPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any banner types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the banner types.
     *
     * @param  \App\User  $user
     * @param  \App\BannerTypes  $bannerTypes
     * @return mixed
     */
    public function view(User $user, BannerTypes $bannerTypes)
    {
        //
    }

    /**
     * Determine whether the user can create banner types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the banner types.
     *
     * @param  \App\User  $user
     * @param  \App\BannerTypes  $bannerTypes
     * @return mixed
     */
    public function update(User $user, BannerTypes $bannerTypes)
    {
        //
    }

    /**
     * Determine whether the user can delete the banner types.
     *
     * @param  \App\User  $user
     * @param  \App\BannerTypes  $bannerTypes
     * @return mixed
     */
    public function delete(User $user, BannerTypes $bannerTypes)
    {
        //
    }

    /**
     * Determine whether the user can restore the banner types.
     *
     * @param  \App\User  $user
     * @param  \App\BannerTypes  $bannerTypes
     * @return mixed
     */
    public function restore(User $user, BannerTypes $bannerTypes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the banner types.
     *
     * @param  \App\User  $user
     * @param  \App\BannerTypes  $bannerTypes
     * @return mixed
     */
    public function forceDelete(User $user, BannerTypes $bannerTypes)
    {
        //
    }
}
