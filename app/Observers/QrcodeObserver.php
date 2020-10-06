<?php

namespace App\Observers;

use App\Qrcode;

class QrcodeObserver
{
    public function saving(Qrcode $qrcode)
    {
        if($qrcode->end_at > \Carbon\Carbon::now()){
            if($qrcode->user_id !=NULL)
            $qrcode->status=2;
            else
            $qrcode->status=3;
        }

 
    }

 
    /**
     * Handle the qrcode "created" event.
     *
     * @param  \App\Qrcode  $qrcode
     * @return void
     */
    public function created(Qrcode $qrcode)
    {
        //
    }

    /**
     * Handle the qrcode "updated" event.
     *
     * @param  \App\Qrcode  $qrcode
     * @return void
     */
    public function updated(Qrcode $qrcode)
    {
        
    }

    /**
     * Handle the qrcode "deleted" event.
     *
     * @param  \App\Qrcode  $qrcode
     * @return void
     */
    public function deleted(Qrcode $qrcode)
    {
        //
    }

    /**
     * Handle the qrcode "restored" event.
     *
     * @param  \App\Qrcode  $qrcode
     * @return void
     */
    public function restored(Qrcode $qrcode)
    {
        //
    }

    /**
     * Handle the qrcode "force deleted" event.
     *
     * @param  \App\Qrcode  $qrcode
     * @return void
     */
    public function forceDeleted(Qrcode $qrcode)
    {
        //
    }
}
