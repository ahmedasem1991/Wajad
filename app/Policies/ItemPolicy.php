<?php

namespace App\Policies;

use App\Item;
use App\User;
use App\Exceptions\Api\ApiException;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('view items')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function view(User $user, Item $item)
    {
        // if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('view items')) {
            return true;
        } else {
            return false;
        }
        //  }
        //  return  true;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('create items')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function update(User $user, Item $item)
    {
        if (Auth()->User()->isCorporateAdmin() || Auth()->User()->isAdmin()) {
            if ($user->hasPermissionTo('edit items')) {
                return true;
            } else {
                return false;
            }
        }

        if ($user->isUser()) {
            if ($user->id == $item->owner_id) {
                return true;
            }
            throw new ApiException(trans('auth.not_authorized'), 400);
        }

        return  true;
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function delete(User $user, Item $item)
    {
        //  if(Auth()->User()->isCorporateAdmin()){
        if ($user->hasPermissionTo('delete items')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can restore the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function restore(User $user, Item $item)
    {
        return  true;
    }

    /**
     * Determine whether the user can permanently delete the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function forceDelete(User $user, Item $item)
    {
        return  true;
    }
    public function destroy(User $user, Item $item)
    {
        if ($user->isUser()) {
            if ($user->id == $item->owner_id) {
                return true;
            }
            throw new ApiException(trans('auth.not_authorized'), 400);
        }
    }
}
