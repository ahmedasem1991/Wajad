<?php

namespace App\Jobs;

use App\GenerateQrcode;
use App\Notifications\BroadcastNotification;
use App\Qrcode;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Nova\Nova;

class GenerateQrcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;

    private $generate_reference_number;

    private $quantity;

    private $type;

    private $generateQrcode;

    private $auth_id;

    private $blue_eyes;

    private $R = 0;

    private $G = 0;

    private $B = 0;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GenerateQrcode $generateQrcode)
    {
        $this->generateQrcode = $generateQrcode;
        $this->id = $generateQrcode->id;
        $this->generate_reference_number = $generateQrcode->generate_reference_number;
        $this->quantity = $generateQrcode->quantity;
        $this->type = $generateQrcode->type;
        $this->auth_id = $generateQrcode->created_by;
        $this->blue_eyes = $generateQrcode->blue_eyes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $now = Carbon::now();
        $middle = $now->year.$now->month.$now->day.'-'.$now->hour.$now->minute;
        if ($this->blue_eyes == 1) {
            $R = 14;
            $G = 177;
            $B = 233;
        } else {
            $R = 0;
            $G = 0;
            $B = 0;
        }
        // $unique_reference_number = 'QR-' . $middle . $now->second  .'-'.str_random(5);
        for ($x = 1; $x <= (int) $this->quantity; $x++) {
            $ImageName = time().Str::random(20).'.png';
            $Url = $this->id.time().Str::random(20);

            // \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
            // ->format('png')
            // ->merge(public_path('/images/'.env('QRCODE_LOGO','logo.png')), 0.2, true)
            // ->size(2000)
            // ->generate(env('API_URL').'/api/scan-qr-code/'.$Url,
            // public_path('images/qrcodes/'.$ImageName));
            \QrCode::
            // gradient(10,20,30,40,50,60,'radial')
            eye('square')
                ->color(1, 0, 0)
                ->margin(3)
                ->eyeColor(0, 0, 0, 0, $R, $G, $B)
                ->eyeColor(1, 0, 0, 0, $R, $G, $B)
                ->eyeColor(2, 0, 0, 0, $R, $G, $B)
                ->format('png')
                ->merge(public_path('/images/wajadfinallogo.png'), 0.2, true)
                ->style('dot', 0.9)
                ->size(300)
                ->generate(env('API_URL').'/api/scan-qr-code/'.$Url,
                    public_path('images/qrcodes/'.$ImageName));

            Qrcode::create([
                'unique_reference_number' => 'QR-'.$middle.Carbon::now()->second.'-'.Str::random(5),
                'generate_reference_number' => $this->generate_reference_number,
                'type' => $this->type,
                'status' => '1',
                'image' => 'images/qrcodes/'.$ImageName,
                'qrcode_url' => $Url,
            ]);

        }

        $level = 'success';
        $message = '"'.$this->quantity.'" QR Code Generated Successfully.';
        $url = Nova::path().'/resources/generate-qrcodes';
        User::find($this->auth_id)->notify(new BroadcastNotification($level, $message, $url));

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
