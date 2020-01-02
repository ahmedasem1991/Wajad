<?php

namespace App\Observers;

use App\Role;

class RoleObserver
{

    public function saving(Role $Role)
    {
        if (Auth()->User()->isCorporateAdmin()) {
           $Role->corporate_id=Auth()->User()->corporate_id;
        }
  
    }
    
    public function saved(Role $Role)
    {
        if (Auth()->User()->isAdmin()) {
            if( $Role->default_group==1){
            $Roles= Role::where('id','!=',$Role->id)->get();
            $dispatcher = Role::getEventDispatcher();
            Role::unsetEventDispatcher();
           
             foreach($Roles as $role)
              {
             $role->default_group=0;
             $role->save();
              }
              Role::setEventDispatcher($dispatcher);
             }
         }  
    }
    /**
     * Handle the role "created" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        //
    }

    /**
     * Handle the role "updated" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function updated(Role $Role)
    {
        if (Auth()->User()->isAdmin()) {
            if( $Role->default_group==1){
            $Roles= Role::where('id','!=',$Role->id)->get();
            $dispatcher = Role::getEventDispatcher();
            Role::unsetEventDispatcher();
           
             foreach($Roles as $role)
              {
             $role->default_group=0;
             $role->save();
              }
              Role::setEventDispatcher($dispatcher);
             }
         }
    }

    /**
     * Handle the role "deleted" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }

    /**
     * Handle the role "restored" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the role "force deleted" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
