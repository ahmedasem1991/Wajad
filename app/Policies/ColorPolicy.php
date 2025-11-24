<?php

namespace App\Policies;

use App\Color;
use App\Policies\Helpers\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColorPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'colors';

    /**
     * Determine whether the user can view any colors.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            return true;
        }

        return $this->permission($user);
    }

    /**
     * Determine whether the user can view the color.
     *
     * @return mixed
     */
    public function view(User $user, Color $color)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create colors.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the color.
     *
     * @return mixed
     */
    public function update(User $user, Color $color)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the color.
     *
     * @return mixed
     */
    public function delete(User $user, Color $color)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the color.
     *
     * @return mixed
     */
    public function restore(User $user, Color $color)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the color.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Color $color)
    {
        return $this->permission($user);
    }
}
