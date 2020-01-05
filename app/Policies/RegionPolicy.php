<?php

namespace App\Policies;

use App\Policies\Helpers\Permission;
use App\User;
use App\Region;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegionPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'areas';

    /**
     * Determine whether the user can view any regions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can view the region.
     *
     * @param  \App\User  $user
     * @param  \App\Region  $region
     * @return mixed
     */
    public function view(User $user, Region $region)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create regions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the region.
     *
     * @param  \App\User  $user
     * @param  \App\Region  $region
     * @return mixed
     */
    public function update(User $user, Region $region)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the region.
     *
     * @param  \App\User  $user
     * @param  \App\Region  $region
     * @return mixed
     */
    public function delete(User $user, Region $region)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the region.
     *
     * @param  \App\User  $user
     * @param  \App\Region  $region
     * @return mixed
     */
    public function restore(User $user, Region $region)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the region.
     *
     * @param  \App\User  $user
     * @param  \App\Region  $region
     * @return mixed
     */
    public function forceDelete(User $user, Region $region)
    {
        return $this->permission($user);
    }
}
