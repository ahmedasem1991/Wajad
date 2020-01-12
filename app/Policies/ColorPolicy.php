<?php

namespace App\Policies;

use App\User;
use App\Color;
use App\Policies\Helpers\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColorPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'colors';

    /**
     * Determine whether the user can view any colors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if(Auth()->User()->isCorporateAdmin()){
            return true;
        }
        return $this->permission($user);
    }

    /**
     * Determine whether the user can view the color.
     *
     * @param  \App\User  $user
     * @param  \App\Color  $color
     * @return mixed
     */
    public function view(User $user, Color $color)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create colors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the color.
     *
     * @param  \App\User  $user
     * @param  \App\Color  $color
     * @return mixed
     */
    public function update(User $user, Color $color)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the color.
     *
     * @param  \App\User  $user
     * @param  \App\Color  $color
     * @return mixed
     */
    public function delete(User $user, Color $color)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the color.
     *
     * @param  \App\User  $user
     * @param  \App\Color  $color
     * @return mixed
     */
    public function restore(User $user, Color $color)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the color.
     *
     * @param  \App\User  $user
     * @param  \App\Color  $color
     * @return mixed
     */
    public function forceDelete(User $user, Color $color)
    {
        return $this->permission($user);
    }
}
