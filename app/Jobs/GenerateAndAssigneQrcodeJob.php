<?php

namespace App\Jobs;

use App\Qrcode;
use Carbon\Carbon;
use App\GenerateQrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class GenerateAndAssigneQrcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $generate_reference_number,$assign_reference_number,$quantity,$status,$type,$user_id,$available_period,$generate_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($QRcodesData)
    {
       $this->generate_reference_number=$QRcodesData['generate_reference_number'];
       $this->assign_reference_number=$QRcodesData['assign_reference_number'];
       $this->quantity=$QRcodesData['quantity'];
       $this->status=$QRcodesData['status'];
       $this->type=$QRcodesData['type'];
       $this->user_id=$QRcodesData['user_id'];
       $this->available_period=$QRcodesData['available_period'];
       $this->generate_id=$QRcodesData['generate_id'];
       
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
    
        for ($x = 1; $x <= (int)$this->quantity; $x++) {
           $ImageName= time().str_random(20).'.png';
           $Url=$this->generate_id.time().str_random(20);
            \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
            ->format('png')->merge(public_path('/images/logo2.png'), 0.3, true)->size(2000)
            ->generate(env('API_URL').'/scan-qr-code/'.$Url,
            public_path('images/qrcodes/'.$ImageName));
            Qrcode::create([
             'reference_number'=>$this->generate_reference_number,
             'assign_reference_number'=>$this->assign_reference_number,
             'type'=>$this->type,
             'status'=>$this->status,
             'image'=>'images/qrcodes/'.$ImageName,
             'qrcode_url'=>$Url,
             'available_period'=>$this->available_period,
             'user_id'=>$this->user_id,
            ]);
            
             
        }

        // $this->generateQrcode->status='finished';
        // $this->generateQrcode->update();
        //  return true;
        // $GenerateQrcode=  GenerateQrcode::find($this->id);
        // $GenerateQrcode->status='finished';
        // $GenerateQrcode->update();
        // Log::info($GenerateQrcode);
        // Log::info('info');
        
    }
}
