<?php

namespace App\Observers;

use App\AssignQrcode;
use App\GenerateQrcode;
use App\Jobs\GenerateAndAssigneQrcodeJob;
use App\Package;
use App\Qrcode;
use App\Subscription;
use Carbon\Carbon;

class SubscriptionObserver
{
    /**
     * Handle the subscription "saving" event.
     *
     * @return void
     */
    public function saving(Subscription $subscription)
    {
        if ($subscription->created_from == 'web') {

            if ($subscription->user_id) {
                $subscription->corporate_id = null;
            } else {
                $subscription->user_id = null;
            }

        }
        //     $subscription->end_date = Carbon::instance($subscription->start_date)->addMonths($subscription->package->getOriginal('period'))->format('Y-m-d');
        //
    }

    public function saved(Subscription $subscription)
    {
        // if($subscription->created_from=='web')
        // {
        $now = Carbon::now();
        $middle = $now->year.$now->month.$now->day.'-'.$now->hour.$now->minute;
        $generate_reference_number = null;
        $assign_reference_number = 'C-'.$middle.$now->second;
        $generate_id = null;

        $Package = Package::find($subscription->package_id);
        // if (count(Qrcode::status('In Stock')->type($Package->type)->get()) < $Package->quantity) {

        //     $generate_reference_number = 'N-' . $middle . $now->second;
        //     $GenerateQRCode = GenerateQrcode::create([
        //         'generate_reference_number' => $generate_reference_number,
        //         'type' => $Package->type,
        //         'quantity' => $Package->quantity,
        //         'created_by' => auth()->user()->id,
        //         'created_from' => 'subscription by admin',
        //     ]);

        //     $generate_id = $GenerateQRCode->id;
        // }

        // $dispatcher = AssignQrcode::getEventDispatcher();
        // AssignQrcode::unsetEventDispatcher();

        $created_from = 'subscription by admin   ('.$Package->name_en.')';
        if ($subscription->created_from == 'Package') {
            $created_from = 'Package ('.$Package->name_en.')';
        }
        $AssignQrcode = AssignQrcode::create([
            'assign_reference_number' => $assign_reference_number,
            'assign_to' => $subscription->subscriber,
            'user_id' => $subscription->user_id,
            'corporate_id' => $subscription->corporate_id,
            'type' => $Package->type,
            'available_period' => str_replace(' Day/s', '', $Package->period),
            'quantity' => $Package->quantity,
            'created_from' => $created_from,
        ]);
        $dispatcher = Subscription::getEventDispatcher();
        Subscription::unsetEventDispatcher();
        $subscription->assign_id = $AssignQrcode->id;
        $subscription->save();
        Subscription::setEventDispatcher($dispatcher);
        // $subscription->save();
        // AssignQrcode::setEventDispatcher($dispatcher);

        // $QRcodesData = [
        //     'generate_id' => $generate_id,
        //     'generate_reference_number' => $generate_reference_number,
        //     'assign_reference_number' => $assign_reference_number,
        //     'quantity' => $Package->quantity,
        //     'status' => 3,
        //     'type' => $Package->type,
        //     'user_id' => $subscription->user_id,
        //     'auth_id' => NULL,
        //    'blue_eyes' => 1,
        //     'corporate_id' => $subscription->corporate_id,
        //     'available_period' => str_replace(" Day/s", "", $Package->period),
        // ];
        //      GenerateAndAssigneQrcodeJob::dispatch($QRcodesData);
        // }
    }

    /**
     * Handle the subscription "updating" event.
     *
     * @return void
     */
    public function updating(Subscription $subscription)
    {
        // $subscription->end_date = Carbon::instance($subscription->start_date)->addMonths($subscription->package->getOriginal('period'))->format('Y-m-d');
    }
}
