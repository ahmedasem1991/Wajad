<?php

namespace App\Policies;

use App\City;
use App\Policies\Helpers\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'cities';

    /**
     * Determine whether the user can view any cities.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can view the city.
     *
     * @return mixed
     */
    public function view(User $user, City $city)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create cities.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the city.
     *
     * @return mixed
     */
    public function update(User $user, City $city)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @return mixed
     */
    public function delete(User $user, City $city)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the city.
     *
     * @return mixed
     */
    public function restore(User $user, City $city)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the city.
     *
     * @return mixed
     */
    public function forceDelete(User $user, City $city)
    {
        return $this->permission($user);
    }
}
