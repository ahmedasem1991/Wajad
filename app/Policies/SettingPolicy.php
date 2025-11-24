<?php

namespace App\Policies;

use App\Setting;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any settings.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if (Auth()->User()->isAdmin()) {
            if ($user->hasPermissionTo('settings')) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Determine whether the user can view the setting.
     *
     * @return mixed
     */
    public function view(User $user, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can create settings.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @return mixed
     */
    public function update(User $user, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @return mixed
     */
    public function delete(User $user, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can restore the setting.
     *
     * @return mixed
     */
    public function restore(User $user, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Setting $setting)
    {
        //
    }
}
