<?php

namespace App\Jobs;

use App\User;
use App\Qrcode;
use Carbon\Carbon;
use Laravel\Nova\Nova;
use App\GenerateQrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\BroadcastNotification;


class GenerateQrcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $id,$generate_reference_number,$quantity,$type,$generateQrcode,$auth_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GenerateQrcode $generateQrcode)
    {
       $this->generateQrcode=$generateQrcode;
       $this->id=$generateQrcode->id;
       $this->generate_reference_number=$generateQrcode->generate_reference_number;
       $this->quantity=$generateQrcode->quantity;
       $this->type=$generateQrcode->type;
       $this->auth_id=$generateQrcode->created_by;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        $now = Carbon::now();
        $middle = $now->year . $now->month . $now->day . '-' . $now->hour . $now->minute;
       // $unique_reference_number = 'QR-' . $middle . $now->second  .'-'.str_random(5);
        for ($x = 1; $x <= (int)$this->quantity; $x++) {
           $ImageName= time().str_random(20).'.png';
           $Url=$this->id.time().str_random(20);
            \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
            ->format('png')->merge(public_path('/images/'.env('QRCODE_LOGO','logo.png')), 0.3, true)->size(2000)
            ->generate(env('API_URL').'/scan-qr-code/'.$Url,
            public_path('images/qrcodes/'.$ImageName));
            Qrcode::create([
            'unique_reference_number'=>'QR-' . $middle . Carbon::now()->second  .'-'.str_random(5),
             'generate_reference_number'=>$this->generate_reference_number,
             'type'=>$this->type,
             'status'=>'1',
             'image'=>'images/qrcodes/'.$ImageName,
             'qrcode_url'=>$Url,
            ]);
            
             
        }

        $level='success';
        $message='"' .$this->quantity .'" QR Code Generated Successfully.';
        $url=Nova::path().'/resources/generate-qrcodes';
        User::find($this->auth_id)->notify(new BroadcastNotification($level,$message,$url));
 

        // $this->generateQrcode->status='finished';
        // $this->generateQrcode->update();
        //  return true;
        // $GenerateQrcode=  GenerateQrcode::find($this->id);
        // $GenerateQrcode->status='finished';
        // $GenerateQrcode->created_from='web/updated';
        // $GenerateQrcode->update();
        // Log::info($GenerateQrcode);
        // Log::info('info');
        
    }
}
