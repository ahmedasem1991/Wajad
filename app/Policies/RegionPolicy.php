<?php

namespace App\Policies;

use App\Policies\Helpers\Permission;
use App\Region;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegionPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'areas';

    /**
     * Determine whether the user can view any regions.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can view the region.
     *
     * @return mixed
     */
    public function view(User $user, Region $region)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create regions.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the region.
     *
     * @return mixed
     */
    public function update(User $user, Region $region)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the region.
     *
     * @return mixed
     */
    public function delete(User $user, Region $region)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the region.
     *
     * @return mixed
     */
    public function restore(User $user, Region $region)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the region.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Region $region)
    {
        return $this->permission($user);
    }
}
