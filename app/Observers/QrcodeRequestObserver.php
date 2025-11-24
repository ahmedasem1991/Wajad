<?php

namespace App\Observers;

use App\QrcodeRequest;

class QrcodeRequestObserver
{
    /**
     * Handle the qrcode request "created" event.
     *
     * @return void
     */
    public function saving(QrcodeRequest $qrcodeRequest)
    {
        $qrcodeRequest->corporate_id = Auth()->user()->corporate->id;
        $qrcodeRequest->corporate_admin_id = Auth()->User()->id;
    }

    /**
     * Handle the qrcode request "updated" event.
     *
     * @return void
     */
    public function updated(QrcodeRequest $qrcodeRequest)
    {
        //
    }

    /**
     * Handle the qrcode request "deleted" event.
     *
     * @return void
     */
    public function deleted(QrcodeRequest $qrcodeRequest)
    {
        //
    }

    /**
     * Handle the qrcode request "restored" event.
     *
     * @return void
     */
    public function restored(QrcodeRequest $qrcodeRequest)
    {
        //
    }

    /**
     * Handle the qrcode request "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(QrcodeRequest $qrcodeRequest)
    {
        //
    }
}
