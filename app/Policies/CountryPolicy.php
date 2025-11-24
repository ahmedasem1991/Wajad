<?php

namespace App\Policies;

use App\Country;
use App\Policies\Helpers\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'countries';

    /**
     * Determine whether the user can view any countries.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can view the country.
     *
     * @return mixed
     */
    public function view(User $user, Country $country)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create countries.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the country.
     *
     * @return mixed
     */
    public function update(User $user, Country $country)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the country.
     *
     * @return mixed
     */
    public function delete(User $user, Country $country)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the country.
     *
     * @return mixed
     */
    public function restore(User $user, Country $country)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the country.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Country $country)
    {
        return $this->permission($user);
    }
}
