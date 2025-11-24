<?php

namespace App\Policies;

use App\Support;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any supports.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if (Auth()->User()->isAdmin()) {
            if ($user->hasPermissionTo('support')) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Determine whether the user can view the support.
     *
     * @return mixed
     */
    public function view(User $user, Support $support)
    {
        return true;
    }

    /**
     * Determine whether the user can create supports.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the support.
     *
     * @return mixed
     */
    public function update(User $user, Support $support)
    {
        //
    }

    /**
     * Determine whether the user can delete the support.
     *
     * @return mixed
     */
    public function delete(User $user, Support $support)
    {
        //
    }

    /**
     * Determine whether the user can restore the support.
     *
     * @return mixed
     */
    public function restore(User $user, Support $support)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the support.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Support $support)
    {
        //
    }
}
