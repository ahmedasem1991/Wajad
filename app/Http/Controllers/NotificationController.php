<?php

namespace App\Http\Controllers;

use App\Events\SendFCMEvent;
use App\Item;
use App\Notifications\SMSNotification;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendFCM(Request $request)
    {
        $user = User::find(2);
        $item = Item::find(1);
        $badge = getBadge($user);
        $data = sendCreateItemFCM($item, $badge);
        $user = User::find(2);
        event(new SendFCMEvent($user, $data));
    }

    public function sendSMS(Request $request)
    {
        $User = User::find(1);
        $name = $User->name;
        $message = 'Test Message';
        $User->notify(new SMSNotification($name, $message));

    }
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
}
