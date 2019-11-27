<?php

namespace App\Notifications;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class SMSNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $name,$message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$message)
    {
        $this->name=$name;
        $this->message=$message;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
 

    public function toNexmo($notifiable)
    
    {
        return (new NexmoMessage)
            ->content(trans('keywords.dear').$this->name.'..' .$this->message .'.');
    }
    
    public function failed(Exception $exception)
    {
        logger($exception);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
