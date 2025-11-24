<?php

namespace App\Observers;

use App\Qrcode;

class QrcodeObserver
{
    public function saving(Qrcode $qrcode)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            if ($qrcode->status == 6) {
                // if( \Carbon\Carbon::now() < $qrcode->end_at ){
                if ($qrcode->user_id != null) {
                    $qrcode->status = 2;
                } else {
                    $qrcode->status = 3;
                }
                // }
            }
        }

    }

    /**
     * Handle the qrcode "created" event.
     *
     * @return void
     */
    public function created(Qrcode $qrcode)
    {
        //
    }

    /**
     * Handle the qrcode "updated" event.
     *
     * @return void
     */
    public function updated(Qrcode $qrcode) {}

    /**
     * Handle the qrcode "deleted" event.
     *
     * @return void
     */
    public function deleted(Qrcode $qrcode)
    {
        //
    }

    /**
     * Handle the qrcode "restored" event.
     *
     * @return void
     */
    public function restored(Qrcode $qrcode)
    {
        //
    }

    /**
     * Handle the qrcode "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Qrcode $qrcode)
    {
        //
    }
}
