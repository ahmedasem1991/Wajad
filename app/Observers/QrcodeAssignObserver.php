<?php

namespace App\Observers;

use App\QrCode;
use Carbon\Carbon;
use App\AssignQrcode;
use App\GenerateQrcode;
use Illuminate\Support\Str;
use App\Jobs\AssignQrcodeJob;
use App\Jobs\GenerateQrcodeJob;
use Illuminate\Support\Facades\Log;

class QrcodeAssignObserver
{
    /**
     * Handle the GenerateQrcode "created" event.
     *
     * @param  \App\GenerateQrcode $GenerateQrcode
     * @return void
     */
    public function saving(AssignQrcode $assignQrcode)
    {
         
        $now = Carbon::now();
        $pre='';
        ($assignQrcode->assign_to==1)? $pre='U-':$pre='C-';
         $assignQrcode->assign_reference_number=$pre.$now->year.$now->month.$now->day.'-'.$now->hour.$now->minute.$now->second;
         //.$assignQrcode->id;
    
        if(!$assignQrcode->user_id)
        $assignQrcode->user_id=null;
        if(!$assignQrcode->corporate_id)
        $assignQrcode->corporate_id=null;
       

      
                 
       
    }
    public function saved(AssignQrcode $assignQrcode)
    {
        
        AssignQrcodeJob::dispatch($assignQrcode);
    }

    /**
     * Handle the GenerateQrcode "updated" event.
     *
     * @param  \App\GenerateQrcode $GenerateQrcode
     * @return void
     */
    public function updated(GenerateQrcode $GenerateQrcode)
    {
        //
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
