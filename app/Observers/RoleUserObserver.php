<?php

namespace App\Observers;

use App\Role;
use App\RoleUser;
use App\User;

class RoleUserObserver
{
    /**
     * Handle the role user "created" event.
     *
     * @return void
     */
    public function created(RoleUser $roleUser)
    {
        //
    }

    public function saving(RoleUser $roleUser)
    {
        logger('saving test role user');
        $user = User::find($roleUser->user_id);
        $role = Role::find($roleUser->role_id);
        $user->max_posts_number = $role->limitation_of_posts;
        $user->save();
    }

    public function saved(RoleUser $roleUser)
    {
        logger('test role user');
        $user = User::find($roleUser->user_id);
        $role = Role::find($roleUser->role_id);
        $user->max_posts_number = $role->limitation_of_posts;
        $user->save();

    }

    /**
     * Handle the role user "updated" event.
     *
     * @return void
     */
    public function updated(RoleUser $roleUser)
    {
        //
    }

    /**
     * Handle the role user "deleted" event.
     *
     * @return void
     */
    public function deleted(RoleUser $roleUser)
    {
        //
    }

    /**
     * Handle the role user "restored" event.
     *
     * @return void
     */
    public function restored(RoleUser $roleUser)
    {
        //
    }

    /**
     * Handle the role user "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(RoleUser $roleUser)
    {
        //
    }
}
