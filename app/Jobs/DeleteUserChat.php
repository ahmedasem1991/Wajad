<?php

namespace App\Jobs;

use App\User;
use App\PostRequest;
use App\AssignQrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteUserChat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $user, $token;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $url = "https://api.mesibo.com/api.php?op=userdel&token=".env('MESIBO_APP_TOKEN')."&uid=". $this->user->mesibo_uid;
        $client = new \GuzzleHttp\Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $response = $client->get($url);
        $response = json_decode($response->getBody(), true);
        logger($response);
        // $this->createQuickSession();
        // $this->deleteQuickUser();
    }

    // public function createQuickSession()
    // {

    //     $url = "https://api.quickblox.com/session.json";
    //     $Now = \Carbon\Carbon::now()->timestamp;
    //     $Data = 'application_id=' . env('QUICKBLOX_APPLICATION_ID') . '&auth_key=' . env('QUICKBLOX_AUTH_KEY') . '&nonce=&timestamp=' . $Now.'&user[login]=SmartAppCo&user[password]=Smart@12345';
      
    //     //logger( $Data );
    //     $Hash = hash_hmac('SHA1', $Data, env('QUICKBLOX_AUTH_SECRET'));
       

    //     $form_params['application_id'] = env('QUICKBLOX_APPLICATION_ID');
    //     $form_params['auth_key'] = env('QUICKBLOX_AUTH_KEY');
    //     $form_params['timestamp'] = $Now;
    //     $form_params['nonce'] = "";
    //     $form_params['signature'] = $Hash;
    //     $form_params['user']['login'] = 'SmartAppCo';
    //     $form_params['user']['password'] = 'Smart@12345';

    //     $data = json_encode($form_params);
 
    //     $client = new \GuzzleHttp\Client([
    //         'headers' => ['Content-Type' => 'application/json']
    //     ]);
    //     $response = $client->post(
    //         $url,
    //         ['body' => $data]
    //     );
    //     $response = json_decode($response->getBody(), true);

    //     $this->token = $response['session']['token'];
      
    // }



    // public function deleteQuickUser()
    // {
    //     $token=$this->token;
    //     $url = "https://api.quickblox.com/users/".$this->user->quick_user_id.".json";
 
 
    //     $client = new \GuzzleHttp\Client([
    //         'headers' => [
    //             //'Content-Type' => 'application/json',
    //             'QB-Token' => $token,

    //         ]
    //     ]);

       
    //     $response = $client->delete($url);
       
      
  
    // }
}
