<?php

namespace App\Observers;

use App\QrCode;
use Carbon\Carbon;
use App\GenerateQrcode;
use Illuminate\Support\Str;
use App\Jobs\AssignQrcodeJob;
use App\CorporateAssignQrcode;
use App\Jobs\GenerateQrcodeJob;
use Illuminate\Support\Facades\Log;
use App\Jobs\CorporateAssignQrcodeJob;

class CorporateQrcodeAssignObserver
{
    /**
     * Handle the GenerateQrcode "created" event.
     *
     * @param  \App\GenerateQrcode $GenerateQrcode
     * @return void
     */
    public function saving(CorporateAssignQrcode $assignQrcode)
    {
         
       $user_id= session()->get('smart_user_id');
       //session()->forget('smart_user_id');
         $now = Carbon::now();
         $pre='C-';
         $assignQrcode->corporate_assign_reference_number=$pre.$now->year.$now->month.$now->day.'-'.$now->hour.$now->minute.$now->second; 
         $assignQrcode->corporate_id=Auth()->User()->corporate->id;
         $assignQrcode->created_by=Auth()->User()->id;
         $assignQrcode->user_id=$user_id;
         logger($assignQrcode);
     
    }
    public function saved(CorporateAssignQrcode $assignQrcode)
    { 
        
           CorporateAssignQrcodeJob::dispatch($assignQrcode);
      
    }

    /**
     * Handle the CorporateAssignQrcode "updated" event.
     *
     * @param  \App\GeneraCorporateAssignQrcodeteQrcode $CorporateAssignQrcode
     * @return void
     */
    public function updated(CorporateAssignQrcode $CorporateAssignQrcode)
    {
        //
    }

    /**
     * Handle the CorporateAssignQrcode "deleted" event.
     *
     * @param  \App\GenerateQCorporateAssignQrcodercode $CorporateAssignQrcode
     * @return void
     */
    public function deleted(CorporateAssignQrcode $CorporateAssignQrcode)
    {
        //
    }

    /**
     * Handle the CorporateAssignQrcode "restored" event.
     *
     * @param  \App\CorporateAssignQrcode $CorporateAssignQrcode
     * @return void
     */
    public function restored(CorporateAssignQrcode $CorporateAssignQrcode)
    {
        //
    }

    /**
     * Handle the CorporateAssignQrcode "force deleted" event.
     *
     * @param  \App\CorporateAssignQrcode $CorporateAssignQrcode
     * @return void
     */
    public function forceDeleted(CorporateAssignQrcode $CorporateAssignQrcode)
    {
        //
    }
}
