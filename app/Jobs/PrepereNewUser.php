<?php

namespace App\Jobs;

use App\AssignQrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PrepereNewUser implements ShouldQueue
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
        $this->createQuickSession();
        $this->createQuickUser();
    }

    public function createQuickSession()
    {

        $url = "https://api.quickblox.com/session.json";
        $Now = \Carbon\Carbon::now()->timestamp;
        $Data = 'application_id=' . env('QUICKBLOX_APPLICATION_ID') . '&auth_key=' . env('QUICKBLOX_AUTH_KEY') . '&nonce=&timestamp=' . $Now;
        $Hash = hash_hmac('SHA1', $Data, env('QUICKBLOX_AUTH_SECRET'));

        $form_params['application_id'] = env('QUICKBLOX_APPLICATION_ID');
        $form_params['auth_key'] = env('QUICKBLOX_AUTH_KEY');
        $form_params['timestamp'] = $Now;
        $form_params['nonce'] = "";
        $form_params['signature'] = $Hash;

        $data = json_encode($form_params);

        $client = new \GuzzleHttp\Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $response = $client->post(
            $url,
            ['body' => $data]
        );
        $response = json_decode($response->getBody(), true);

        $this->token = $response['session']['token'];
        logger( $this->token);
    }



    public function createQuickUser()
    {
        $new_user=$this->user;
        $token=$this->token;
        $url = "https://api.quickblox.com/users.json";

        $form_params['login'] = $new_user->email;
        $form_params['password'] = $new_user->quick_user_password;
        $form_params['email'] = $new_user->email;
        $form_params['external_user_id'] =$new_user->id;
        $form_params['facebook_id'] = "";
        $form_params['full_name'] =  $new_user->name;
        $form_params['phone'] =$new_user->country->country_code. $new_user->mobile_number;
        $form_params['website'] = '';
        $form_params['tag_list'] = '';
        $form_params['custom_data'] = '';

        $user['user'] = $form_params;

        $data = json_encode($user);

        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'QB-Token' => $token,

            ]
        ]);
        $response = $client->post(
            $url,
            ['body' => $data]
        );
        $response = json_decode($response->getBody(), true);

         if($response['user']['id']);
      {  
          $new_user->quick_user_id= $response['user']['id'];
          $new_user->save();
          logger('test id');
      }
        logger($response);
       
    }
}
