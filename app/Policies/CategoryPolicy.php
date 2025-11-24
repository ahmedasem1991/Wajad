<?php

namespace App\Policies;

use App\Category;
use App\Policies\Helpers\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'categories';

    /**
     * Determine whether the user can view any categories.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can view the category.
     *
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create categories.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the category.
     *
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the category.
     *
     * @return mixed
     */
    public function restore(User $user, Category $category)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the category.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Category $category)
    {
        return $this->permission($user);
    }
}
