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


class GenerateQrcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $id,$reference_number,$quantity,$type,$generateQrcode;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GenerateQrcode $generateQrcode)
    {
       $this->generateQrcode=$generateQrcode;
       $this->id=$generateQrcode->id;
       $this->reference_number=$generateQrcode->reference_number;
       $this->quantity=$generateQrcode->quantity;
       $this->type=$generateQrcode->type;
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
           $Url=$this->id.time().str_random(20);
            \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
            ->format('png')->merge(public_path('/images/wajad_logo.png'), 0.3, true)->size(2000)
            ->generate(env('API_URL').'/scan-qr-code/'.$Url,
            public_path('images/qrcodes/'.$ImageName));
            Qrcode::create([
             'reference_number'=>$this->reference_number,
             'type'=>$this->type,
             'status'=>'1',
             'image'=>'images/qrcodes/'.$ImageName,
             'qrcode_url'=>$Url,
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
