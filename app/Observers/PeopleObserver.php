<?php

namespace App\Observers;

use App\People;

class PeopleObserver
{
    /**
     * Handle the people "created" event.
     *
     * @param  \App\People  $people
     * @return void
     */

  
    public function saving(People $people)
    {
        $people->mobile_number=   str_replace(' ', '',$people->mobile_number);
        if (Auth()->check() && Auth()->User()->isCorporateAdmin()) {

            $people->corporate_id = Auth()->User()->corporate_id;
        }

    }
 
    public function updating(People $people)
    {
        $people->mobile_number=   str_replace(' ', '',$people->mobile_number);
    }


    public function created(People $people)
    {
        //
    }

    /**
     * Handle the people "updated" event.
     *
     * @param  \App\People  $people
     * @return void
     */
    public function updated(People $people)
    {
        //
    }

    /**
     * Handle the people "deleted" event.
     *
     * @param  \App\People  $people
     * @return void
     */
    public function deleted(People $people)
    {
        //
    }

    /**
     * Handle the people "restored" event.
     *
     * @param  \App\People  $people
     * @return void
     */
    public function restored(People $people)
    {
        //
    }

    /**
     * Handle the people "force deleted" event.
     *
     * @param  \App\People  $people
     * @return void
     */
    public function forceDeleted(People $people)
    {
        //
    }
}
