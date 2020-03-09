<?php

namespace App\Policies;

use App\User;
use App\Setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingsPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Setting $settings)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Setting $settings)
    {
        return auth()->user()->isAdmin();
    }

    public function delete(User $user, Setting $settings)
    {
        return false;
    }

    public function restore(User $user, Setting $settings)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the settings.
     *
     * @param  \App\User  $user
     * @param  \App\Settings  $settings
     * @return mixed
     */
    public function forceDelete(User $user, Setting $settings)
    {
        return false;
    }
}
