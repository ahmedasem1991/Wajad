<?php

namespace App\Policies;

use App\Brand;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\URL;

class BrandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any brands.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if (Auth()->User()->isAdmin()) {
            if ($user->hasPermissionTo('brands')) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * Determine whether the user can view the brand.
     *
     * @return mixed
     */
    public function view(User $user, Brand $brand)
    {
        return true;
    }

    /**
     * Determine whether the user can create brands.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth()->User()->isAdmin() ? true : false;
    }

    /**
     * Determine whether the user can update the brand.
     *
     * @return mixed
     */
    public function update(User $user, Brand $brand)
    {
        return Auth()->User()->isAdmin() ? true : false;
    }

    /**
     * Determine whether the user can delete the brand.
     *
     * @return mixed
     */
    public function delete(User $user, Brand $brand)
    {
        return Auth()->User()->isAdmin() ? true : false;
    }

    /**
     * Determine whether the user can restore the brand.
     *
     * @return mixed
     */
    public function restore(User $user, Brand $brand)
    {
        return Auth()->User()->isAdmin() ? true : false;
    }

    /**
     * Determine whether the user can permanently delete the brand.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Brand $brand)
    {
        return Auth()->User()->isAdmin() ? true : false;
    }

    public function addModel()
    {
        $URL = URL::current();

        if (strstr($URL, 'relate-authorization')) {
            logger('No model');

            return false;
        } else {
            logger('yes model');

            return true;
        }
    }
}
