<?php

namespace App\Observers;

use App\Role;

class RoleObserver2
{
    /**
     * Handle the Role "saving" event.
     *
     * @return void
     */
    public function saving(Role $Role)
    {
        if (Auth()->User()->isCorporateAdmin()) {

            $Role->corporate_id = Auth()->User()->corporate_id;
            logger($Role);
        }

    }
}
