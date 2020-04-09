<?php

namespace App\Policies;

use App\User;
use App\Model;
use App\Policies\Helpers\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModelPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'models';

    /**
     * Determine whether the user can view any models.
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
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $model
     * @return mixed
     */
    public function view(User $user, Model $model)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $model
     * @return mixed
     */
    public function update(User $user, Model $model)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $model
     * @return mixed
     */
    public function delete(User $user, Model $model)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $model
     * @return mixed
     */
    public function restore(User $user, Model $model)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model  $model
     * @return mixed
     */
    public function forceDelete(User $user, Model $model)
    {
        return $this->permission($user);
    }
}
