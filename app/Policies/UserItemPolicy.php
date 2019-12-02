<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserItemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Item $item)
    {
        if ($user->id == $item->owner_id) {
            return true;
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
    }

    public function destroy(User $user, Item $item)
    {
        if ($user->id == $item->owner_id) {
            return true;
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
    }
}
