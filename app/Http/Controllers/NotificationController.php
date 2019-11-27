<?php
  
namespace App\Http\Controllers;

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
        $data=[
            'notification' => [
            'title'=>'This is the title',
            'body'=>'This is the message',
            'sound' => 'default'
            ],
              'data' => [
              'extraPayLoad1' => 'value1',
              'extraPayLoad2' => 'value2'
              ]];
        $tokens=User::all()->pluck('device_token')->toArray();
        event(new SendFCMEvent($tokens,$data));
 
  
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