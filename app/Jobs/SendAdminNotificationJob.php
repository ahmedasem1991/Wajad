<?php

namespace App\Jobs;

use App\User;
use App\AdminNotification;
use Illuminate\Support\Arr;
use LaravelFCM\Facades\FCM;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use LaravelFCM\Message\Topics;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendFCMNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use LaravelFCM\Message\PayloadNotificationBuilder;
use App\Mail\AdminNotification as MailAdminNotification;

class SendAdminNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected  $body, $send_to, $send_by , $users;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($body, $send_to, $send_by, $users)
    {


        $this->body = $body;
        $this->send_to = $send_to;
        $this->send_by = $send_by;
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        
        if (strpos($this->send_by, 'fcm') !== false) {
            // if (in_array("fcm",$this->send_by)) {
            // To All Users
            if ($this->send_to == 0) {
                $notificationBuilder = new PayloadNotificationBuilder('Wajad');
                $notificationBuilder->setBody($this->body)
                    ->setSound('default');

                $notification = $notificationBuilder->build();

                $topic = new Topics();
                $topic->topic('WAJAD');

                $topicResponse = FCM::sendToTopic($topic, null, $notification, null);
            }

            //Special Users
            if ($this->send_to == 1) {
               
                $Users = User::find($this->users);
               
               
               
             //   dd( $Users);
                foreach ($Users as $user) {
                    $badge = $user->notifications()->whereNull('read_at')->count() == 0 ? 1 : $user->notifications()->whereNull('read_at')->count();
                    $data = sendCustomUsersFCM($this->body, $badge);
                    $user->notify(new SendFCMNotification($user, $data));
                }
            }

            logger('fcm test');
        }
        if (strpos($this->send_by, 'email') !== false) {
            //if (in_array("email", $this->send_by)) {
            // To All Users
            if ($this->send_to == 0) {
                User::chunk(1000, function ($users) {
                    foreach ($users as $user) {
                        Mail::to($user)->send(new MailAdminNotification($this->body));
                    }
                });
            }

            //Special Users
            if ($this->send_to == 1) {
                $Users = User::find($this->users);
                foreach ($Users as $user) {
                    Mail::to($user)->send(new MailAdminNotification($this->body));
                }
            }
            logger('email');
        }
        if (strpos($this->send_by, 'sms') !== false) {
            //if (in_array("sms", $this->send_by)) {
            // To All Users
            if ($this->send_to == 0) {
                User::chunk(1000, function ($users) {
                    foreach ($users as $user) {
                        \Unifonic::send($user->country->country_code . $user->mobile_number, $this->body);
                    }
                });
            }

            //Special Users
            if ($this->send_to == 1) {
                $Users = User::find($this->users);
                foreach ($Users as $user) {
                    \Unifonic::send($user->country->country_code . $user->mobile_number, $this->body);
                }
            }
            logger('sms');
        }
    }
}
