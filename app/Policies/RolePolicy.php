<?php

namespace App\Policies;

use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            if ($user->hasPermissionTo('view roles')) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * Determine whether the user can view the role.
     *
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        if ($user->hasPermissionTo('view roles')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create roles.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('create roles')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the role.
     *
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        if ($user->hasPermissionTo('edit roles')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        if ($user->hasPermissionTo('delete roles')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        return true;
    }
}
