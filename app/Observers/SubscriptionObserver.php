<?php

namespace App\Observers;

use App\Qrcode;
use App\Package;
use Carbon\Carbon;
use App\AssignQrcode;
use App\Subscription;
use App\GenerateQrcode;
use App\Jobs\GenerateAndAssigneQrcodeJob;

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
        if($subscription->created_from=='web')
        {
         
            if($subscription->user_id)
            {
                $subscription->corporate_id=NULL;  
            }
            else{
                $subscription->user_id=NULL; 
            }
     
        } 
    //     $subscription->end_date = Carbon::instance($subscription->start_date)->addMonths($subscription->package->getOriginal('period'))->format('Y-m-d');
    // 
    }
    public function saved(Subscription $subscription)
    {
        if($subscription->created_from=='web')
        {
        $now = Carbon::now();
        $middle = $now->year . $now->month . $now->day . '-' . $now->hour . $now->minute;
        $generate_reference_number = NULL;
        $assign_reference_number = 'C-' . $middle . $now->second;
        $generate_id = NULL;

        $Package=Package::find($subscription->package_id);
        if (count(Qrcode::status('In Stock')->type($Package->type)->get()) < $Package->quantity) {

            $generate_reference_number = 'N-' . $middle . $now->second;
            $GenerateQRCode = GenerateQrcode::create([
                'reference_number' => $generate_reference_number,
                'type' => $Package->type,
                'quantity' => $Package->quantity,
                'created_by' => auth()->user()->id,
                'created_from' => 'subscription by admin',
            ]);

            $generate_id = $GenerateQRCode->id;
        }


        AssignQrcode::create([
            'assign_reference_number' => $assign_reference_number,
            'assign_to' => 2,
            'user_id' => $subscription->user_id,
            'corporate_id' => $subscription->corporate_id,
            'type' => $Package->type,
            'available_period' => str_replace(" Day/s", "", $Package->period),
            'quantity' => $Package->quantity,
            'created_from' => 'subscription by admin'
        ]);


        $QRcodesData = [
            'generate_id' => $generate_id,
            'generate_reference_number' => $generate_reference_number,
            'assign_reference_number' => $assign_reference_number,
            'quantity' => $Package->quantity,
            'status' => 3,
            'type' => $Package->type,
            'user_id' => $subscription->user_id,
            'auth_id' => NULL,
            'corporate_id' => $subscription->corporate_id,
            'available_period' => str_replace(" Day/s", "", $Package->period),
        ];
             GenerateAndAssigneQrcodeJob::dispatch($QRcodesData);
      }
    }

    /**
     * Handle the subscription "updating" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function updating(Subscription $subscription)
    {
        // $subscription->end_date = Carbon::instance($subscription->start_date)->addMonths($subscription->package->getOriginal('period'))->format('Y-m-d');
    }
}
