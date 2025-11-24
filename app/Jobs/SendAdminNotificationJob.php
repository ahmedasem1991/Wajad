<?php

namespace App\Jobs;

use App\Events\SendSMSEvent;
use App\Mail\AdminNotification as MailAdminNotification;
use App\Notifications\SendFCMNotification;
use App\Services\FCM\Facades\FCM;
use App\Services\FCM\Message\PayloadNotificationBuilder;
use App\Services\FCM\Message\Topics;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAdminNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $body;

    protected $send_to;

    protected $send_by;

    protected $users;

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

            // To All Users as adv.
            if ($this->send_to == 2) {
                $notificationBuilder = new PayloadNotificationBuilder('Wajad');
                $notificationBuilder->setBody($this->body)
                    ->setSound('default');

                $notification = $notificationBuilder->build();

                $topic = new Topics;
                $topic->topic('WAJAD');

                $topicResponse = FCM::sendToTopic($topic, null, $notification, null);
            }
            // To All Users
            if ($this->send_to == 0) {

                User::chunk(1000, function ($users) {
                    foreach ($users as $user) {
                        $badge = getBadge($user);
                        $data = sendCustomUsersFCM($this->body, $badge);
                        $user->notify(new SendFCMNotification($user, $data));
                    }
                });

            }

            // Special Users
            if ($this->send_to == 1) {

                $Users = User::find($this->users);

                foreach ($Users as $user) {
                    $badge = getBadge($user);
                    $data = sendCustomUsersFCM($this->body, $badge);
                    $user->notify(new SendFCMNotification($user, $data));
                }
            }

            logger('fcm test');
        }
        if (strpos($this->send_by, 'email') !== false) {
            // if (in_array("email", $this->send_by)) {
            // To All Users
            if ($this->send_to == 0) {
                User::chunk(1000, function ($users) {
                    foreach ($users as $user) {
                        if ($user->receive_emails) {
                            Mail::to($user)->send(new MailAdminNotification($this->body));
                        }
                    }
                });
            }

            // Special Users
            if ($this->send_to == 1) {
                $Users = User::find($this->users);
                foreach ($Users as $user) {
                    if ($user->receive_emails) {
                        Mail::to($user)->send(new MailAdminNotification($this->body));
                    }
                }
            }
            logger('email');
        }
        if (strpos($this->send_by, 'sms') !== false) {
            // if (in_array("sms", $this->send_by)) {
            // To All Users
            if ($this->send_to == 0) {
                User::chunk(1000, function ($users) {
                    foreach ($users as $user) {
                        \Unifonic::send($user->country->country_code.$user->mobile_number, $this->body, 'WAJAD');

                        // new SendSMSEvent($user->country->country_code . $user->mobile_number, $this->body);
                    }
                });
            }

            // Special Users
            if ($this->send_to == 1) {
                $Users = User::find($this->users);
                foreach ($Users as $user) {
                    \Unifonic::send($user->country->country_code.$user->mobile_number, $this->body, 'WAJAD');
                    // new SendSMSEvent($user->country->country_code . $user->mobile_number, $this->body);
                }
            }
            logger('sms');
        }
    }
}
