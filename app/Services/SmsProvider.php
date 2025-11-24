<?php

namespace App\Services;

use App\Jobs\SendMessageJob;

class SmsProvider
{
    public function sendMessage($message, $mobile_number)
    {
        SendMessageJob::dispatch($message, $mobile_number);

        $basic = new \Nexmo\Client\Credentials\Basic(env('NEXMO_KEY'), env('NEXMO_SECRET'));
        $client = new \Nexmo\Client($basic);

        // $client->message()->send([
        //     'to' =>  $mobile_number,
        //     'from' => 'Nexmo',
        //     'text' => $message
        // ]);
    }
}
