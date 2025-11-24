<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('view users')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        // if(Auth()->User()->isCorporateAdmin()){
        if (auth()->user()->id === $model->id) {
            return true;
        }

        if ($user->hasPermissionTo('view users')) {
            return true;
        }

        return false;
        // }
        // return  true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //  if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('create users')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        // if(Auth()->User()->isCorporateAdmin()){

        if (auth()->user()->id === $model->id) {
            return true;
        }

        if ($user->hasPermissionTo('edit users')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        // if(Auth()->User()->isCorporateAdmin()){
        if ($user->id === $model->id) {
            return false;
        }
        if ($user->hasPermissionTo('delete users')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        if ($user->id === $model->id) {
            return false;
        }

        return true;
    }
}
