<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{


    public function saving(User $User)
    {
        $User->mobile_number=   str_replace(' ', '',$User->mobile_number);
        if (Auth::check() && Auth()->User()->isCorporateAdmin()) {

            $User->corporate_id = Auth()->User()->corporate_id;
        }
        
    }
    public function updating(User $User)
    {
        $User->mobile_number=   str_replace(' ', '',$User->mobile_number);
    }
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
