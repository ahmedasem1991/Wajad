<?php

namespace App\Policies;

use App\Policies\Helpers\Permission;
use App\Subcategory;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubcategoryPolicy
{
    use HandlesAuthorization, Permission;

    public $permission = 'sub categories';

    /**
     * Determine whether the user can view any subcategories.
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
     * Determine whether the user can view the subcategory.
     *
     * @return mixed
     */
    public function view(User $user, Subcategory $subcategory)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can create subcategories.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can update the subcategory.
     *
     * @return mixed
     */
    public function update(User $user, Subcategory $subcategory)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can delete the subcategory.
     *
     * @return mixed
     */
    public function delete(User $user, Subcategory $subcategory)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can restore the subcategory.
     *
     * @return mixed
     */
    public function restore(User $user, Subcategory $subcategory)
    {
        return $this->permission($user);
    }

    /**
     * Determine whether the user can permanently delete the subcategory.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Subcategory $subcategory)
    {
        return $this->permission($user);
    }
}
