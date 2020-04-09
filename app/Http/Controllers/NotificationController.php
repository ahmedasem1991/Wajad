<?php
  
namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Events\SendFCMEvent;
use Illuminate\Http\Request;
use App\Notifications\SMSNotification;
use Illuminate\Support\Facades\Validator;
use Srmklive\PayPal\Services\ExpressCheckout;
use Edujugon\PushNotification\PushNotification;
   
class NotificationController extends Controller
{

    public function sendFCM(Request $request)
    {
            $user= User::find(2);
            $item=Item::find(1);
            $badge = $user->notifications()->whereNull('read_at')->count() == 0 ? 1 : $user->notifications()->whereNull('read_at')->count();
            $data=sendCreateItemFCM($item,$badge);
            $user=User::find(2); 
            event(new SendFCMEvent($user,$data));
    }

    public function sendSMS(Request $request)
    {
        $User= User::find(1);
        $name=$User->name;
        $message='Test Message';
        $User->notify(new SMSNotification($name,$message));
        
    }
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    
}