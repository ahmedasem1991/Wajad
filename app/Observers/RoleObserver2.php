<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Role;
use App\Jobs\GenerateAndAssigneQrcodeJob;

class RoleObserver2
{
    /**
     * Handle the Role "saving" event.
     *
     * @param  \App\Role  $Role
     * @return void
     */
    public function saving(Role $Role)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            
            $Role->corporate_id=Auth()->User()->corporate_id;
            logger( $Role);
        }
       
     
    }
    
}
