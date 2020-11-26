<?php

namespace App\Notifications;

use App\Qrcode;
use App\Services\FCM\Facades\FCM;
use App\Events\SendFCMEvent;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class SendFCMNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $user,$data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$data)
    {
       $this->user=$user;
       $this->data=$data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        
        return [
            
            'database',
            'broadcast'
           
        ];
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

    public function toBroadcast($notifiable)
    {
        if($this->user->receive_push_notifications)
       {
        event(new SendFCMEvent($this->user,$this->data));
        return new BroadcastMessage($this->toArray($this->data));
       }
    }
 

    public function toDatabase($notifiable)
    {
        return [ $this->data ];
    }
}
