<?php

namespace App\Policies;

use App\Corporate;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CorporatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any corporates.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if (Auth()->User()->isAdmin()) {
            if ($user->hasPermissionTo('corporates')) {
                return true;
            } else {
                return false;
            }
        }
        if (Auth()->User()->isCorporateAdmin()) {
            return true;
        }

    }

    /**
     * Determine whether the user can view the corporate.
     *
     * @return mixed
     */
    public function view(User $user, Corporate $corporate)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            if (auth()->user()->corporate_id == $corporate->id) {
                return true;
            } else {
                return false;
            }
        }
        if (Auth()->User()->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create corporates.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the corporate.
     *
     * @return mixed
     */
    public function update(User $user, Corporate $corporate)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the corporate.
     *
     * @return mixed
     */
    public function delete(User $user, Corporate $corporate)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the corporate.
     *
     * @return mixed
     */
    public function restore(User $user, Corporate $corporate)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the corporate.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Corporate $corporate)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            return false;
        } else {
            return true;
        }
    }
}
