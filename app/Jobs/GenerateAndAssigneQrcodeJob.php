<?php

namespace App\Jobs;

use App\User;
use App\Qrcode;
use App\Corporate;
use Carbon\Carbon;
use Laravel\Nova\Nova;
use App\GenerateQrcode;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\BroadcastNotification;


class GenerateAndAssigneQrcodeJob implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  private $generate_reference_number, $assign_reference_number, $quantity, $status, $type, $user_id, $corporate_id, $available_period, $generate_id, $auth_id;
  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($QRcodesData)
  {
    $this->generate_reference_number = $QRcodesData['generate_reference_number'];
    $this->assign_reference_number = $QRcodesData['assign_reference_number'];
    $this->quantity = $QRcodesData['quantity'];
    $this->status = $QRcodesData['status'];
    $this->type = $QRcodesData['type'];
    $this->user_id = $QRcodesData['user_id'];
    $this->corporate_id = $QRcodesData['corporate_id'];
    $this->available_period = $QRcodesData['available_period'];
    $this->generate_id = $QRcodesData['generate_id'];
    $this->auth_id = $QRcodesData['auth_id'];
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    if ($this->generate_reference_number == NULL) {
      $QRCodes = Qrcode::status('In Stock')->type($this->type)->take($this->quantity)->get();
      foreach ($QRCodes as $QRCode) {
        $QRCode->assign_reference_number = $this->assign_reference_number;
        $QRCode->status = $this->status;
        $QRCode->available_period = $this->available_period;
        $QRCode->user_id = $this->user_id;
        $QRCode->corporate_id = $this->corporate_id;
        $QRCode->save();
      }
    } else {
      $now = Carbon::now();
      $middle = $now->year . $now->month . $now->day . '-' . $now->hour . $now->minute;
      $unique_reference_number = 'QR-' . $middle . $now->second  . '-' . Str::random(5);
      for ($x = 1; $x <= (int)$this->quantity; $x++) {
        $ImageName = time() . Str::random(20) . '.png';
        $Url = $this->generate_id . time() . Str::random(20);
        //  \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
        //  ->format('png')->merge(public_path('/images/'.env('QRCODE_LOGO','logo.png')), 0.2, true)
        //  ->size(2000)
        //  ->generate(env('API_URL').'/scan-qr-code/'.$Url,
        //  public_path('images/qrcodes/'.$ImageName));
        \QrCode::
          //gradient(10,20,30,40,50,60,'radial')
          eye('square')
          ->color(1, 0, 0)
          ->margin(3)
          //   ->eyeColor(0, 0,0, 0, 6,120, 160) 
          //   ->eyeColor( 1,0,0, 0, 6,120, 160)  
          //   ->eyeColor( 2,0,0, 0, 6,120, 160) 

          ->format('png')
          ->merge(public_path('/images/wajadfinallogo.png'), 0.2, true)
          ->style('dot', 0.9)
          ->size(2000)
         ->generate(env('API_URL').'/scan-qr-code/'.$Url,
         public_path('images/qrcodes/'.$ImageName));

        Qrcode::create([
          'unique_reference_number' => $unique_reference_number,

          'generate_reference_number' => $this->generate_reference_number,
          'assign_reference_number' => $this->assign_reference_number,
          'type' => $this->type,
          'status' => $this->status,
          'image' => 'images/qrcodes/' . $ImageName,
          'qrcode_url' => $Url,
          'available_period' => $this->available_period,
          'user_id' => $this->user_id,
          'corporate_id' => $this->corporate_id,
        ]);
      }
    }

    //  $level='success';
    //  $url=Nova::path().'/resources/stocks';
    //  $Admins=User::superAdmin()->get();
    //  $corporate_message='"' .$this->quantity .'" QR Code Assigned Successfully To You.';
    //  if($this->auth_id !=NULL)
    //  {
    //   $message='"' .$this->quantity .'" QR Code Assigned Successfully To '. User::find($this->auth_id)->corporate->name_en .'.';
    //   User::find($this->auth_id)->notify(new BroadcastNotification($level,$corporate_message,$url));
    //  }



    //  foreach($Admins as $user)
    //  {
    //    $user->notify(new BroadcastNotification('info',$message,$url));
    //  }

    $level = 'success';
    $url = Nova::path() . '/resources/stocks';
    $Admins = User::superAdmin()->get();
    $corporate_message = '"' . $this->quantity . '" QR Code Assigned Successfully To You.';
    $message = '';
    if ($this->auth_id != NULL) {
      $message = '"' . $this->quantity . '" QR Code Assigned Successfully To ' . User::find($this->auth_id)->corporate->name_en . '.';
      User::find($this->auth_id)->notify(new BroadcastNotification($level, $corporate_message, $url));
    } else if ($this->user_id != NULL) {
      $message = '"' . $this->quantity . '" QR Code Assigned Successfully To ' . User::find($this->user_id)->corporate->name_en . '.';
      User::find($this->user_id)->notify(new BroadcastNotification($level, $corporate_message, $url));
    } else if ($this->corporate_id != NULL) {
      $Corporate = Corporate::find($this->corporate_id);
      $message = '"' . $this->quantity . '" QR Code Assigned Successfully To ' . $Corporate->name_en . '.';
      $CorporateAdmins = $Corporate->users->where('type', 2);
      foreach ($CorporateAdmins as $user) {
        $user->notify(new BroadcastNotification($level, $corporate_message, $url));
      }
    }
    foreach ($Admins as $user) {
      $user->notify(new BroadcastNotification('info', $message, $url));
    }

    // $level = 'success';
    // $url = Nova::path() . '/resources/stocks';
    // $Admins = User::superAdmin()->get();
    // $corporate_message = '"' . $this->quantity . '" QR Code Assigned Successfully To You.';
    // if ($this->auth_id != NULL) {
    //     $message = '"' . $this->quantity . '" QR Code Assigned Successfully To ' . User::find($this->auth_id)->corporate->name_en . '.';
    //     User::find($this->auth_id)->notify(new BroadcastNotification($level, $corporate_message, $url));
    // } else if ($this->user_id != NULL) {
    //     $message = '"' . $this->quantity . '" QR Code Assigned Successfully To ' . User::find($this->user_id)->corporate->name_en . '.';
    //     User::find($this->user_id)->notify(new BroadcastNotification($level, $corporate_message, $url));
    // } else if ($this->corporate_id != NULL) {
    //     $Corporate = Corporate::find($this->corporate_id);
    //     $message = '"' . $this->quantity . '" QR Code Assigned Successfully To ' . $Corporate->name_en . '.';
    //     $CorporateAdmins = $Corporate->users->where('type', 2);
    //     foreach ($CorporateAdmins as $user) {
    //         $user->notify(new BroadcastNotification($level, $corporate_message, $url));
    //     }
    // }
    // foreach ($Admins as $user) {
    //     $user->notify(new BroadcastNotification($level, $message, $url));
    // }


  }
}
