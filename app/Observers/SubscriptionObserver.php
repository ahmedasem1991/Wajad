<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Subscription;

class SubscriptionObserver
{
    /**
     * Handle the subscription "saving" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function saving(Subscription $subscription)
    {
    //     $subscription->end_date = Carbon::instance($subscription->start_date)->addMonths($subscription->package->getOriginal('period'))->format('Y-m-d');
    // 
    }

    /**
     * Handle the subscription "updating" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function updating(Subscription $subscription)
    {
        $subscription->end_date = Carbon::instance($subscription->start_date)->addMonths($subscription->package->getOriginal('period'))->format('Y-m-d');
    }
}
