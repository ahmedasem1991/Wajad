<?php

namespace App\Observers;

use App\QrCode;
use Carbon\Carbon;
use App\GenerateQrcode;
use Illuminate\Support\Str;
use App\Jobs\GenerateQrcodeJob;
use Illuminate\Support\Facades\Log;
use Auth;
class QrcodeGenerateObserver
{
    /**
     * Handle the GenerateQrcode "created" event.
     *
     * @param  \App\GenerateQrcode $GenerateQrcode
     * @return void
     */
    public function saving(GenerateQrcode $generateQrcode)
    { 
            if($generateQrcode->created_from=='web')
            {
                $now = Carbon::now();
                $generateQrcode->reference_number='N-'.$now->year.$now->month.$now->day.'-'.$now->hour.$now->minute.$now->second;
                $generateQrcode->created_by=Auth()->User()->id;
            }
           
        
        
         
    }
    public function saved(GenerateQrcode $generateQrcode)
    {
        if($generateQrcode->created_from=='web')
        {
        GenerateQrcodeJob::dispatch($generateQrcode);
        }
    }

    /**
     * Handle the GenerateQrcode "updated" event.
     *
     * @param  \App\GenerateQrcode $GenerateQrcode
     * @return void
     */
    public function updated(GenerateQrcode $GenerateQrcode)
    {
     //   return false;
    }
    public function updating(GenerateQrcode $GenerateQrcode)
    {
       // return false;
    }

    /**
     * Handle the GenerateQrcode "deleted" event.
     *
     * @param  \App\GenerateQrcode $GenerateQrcode
     * @return void
     */
    public function deleted(GenerateQrcode $GenerateQrcode)
    {
        //
    }

    /**
     * Handle the GenerateQrcode "restored" event.
     *
     * @param  \App\GenerateQrcode $GenerateQrcode
     * @return void
     */
    public function restored(GenerateQrcode $GenerateQrcode)
    {
        //
    }

    /**
     * Handle the GenerateQrcode "force deleted" event.
     *
     * @param  \App\GenerateQrcode $GenerateQrcode
     * @return void
     */
    public function forceDeleted(GenerateQrcode $GenerateQrcode)
    {
        //
    }
}
