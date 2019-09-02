<?php

namespace App\Policies;

use App\User;
use App\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingsPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Settings $settings)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Settings $settings)
    {
        return auth()->user()->isAdmin();
    }

    public function delete(User $user, Settings $settings)
    {
        return false;
    }

    public function restore(User $user, Settings $settings)
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
    public function forceDelete(User $user, Settings $settings)
    {
        return false;
    }
}
