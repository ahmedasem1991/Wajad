<?php

namespace App\Observers;

use App\People;

class PeopleObserver
{
    /**
     * Handle the people "created" event.
     *
     * @return void
     */
    public function saving(People $people)
    {
        $people->mobile_number = str_replace(' ', '', $people->mobile_number);
        if (Auth()->check() && Auth()->User()->isCorporateAdmin()) {

            $people->corporate_id = Auth()->User()->corporate_id;
        }

    }

    public function updating(People $people)
    {
        $people->mobile_number = str_replace(' ', '', $people->mobile_number);
    }

    public function created(People $people)
    {
        //
    }

    /**
     * Handle the people "updated" event.
     *
     * @return void
     */
    public function updated(People $people)
    {
        //
    }

    /**
     * Handle the people "deleted" event.
     *
     * @return void
     */
    public function deleted(People $people)
    {
        //
    }

    /**
     * Handle the people "restored" event.
     *
     * @return void
     */
    public function restored(People $people)
    {
        //
    }

    /**
     * Handle the people "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(People $people)
    {
        //
    }
}
