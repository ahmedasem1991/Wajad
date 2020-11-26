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

class ScanQRCodeNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $lat,$lng,$qr_code,$data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data,$qr_code,$lat, $lng)
    {
       $this->lat=$lat;
       $this->lng=$lng;
       $this->qr_code=$qr_code;
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
            'mail',
            'database',
            'broadcast'
           
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->qr_code->user->receive_emails){
            $GooleMap='https://www.google.com/maps/search/?api=1&query='
            .$this->lat
            .','.
            $this->lng;
            
            
     
            return (new MailMessage)
                        ->line('There Some One Scanned Your QR Code.')
                        ->action('Open Location', url($GooleMap))
                        ->line('Thank you for using WAJAD!');
        }

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
        if($this->qr_code->user->receive_push_notifications){
            event(new SendFCMEvent($this->qr_code->user,$this->data));
            return new BroadcastMessage($this->toArray($this->data));
        }
        
       
    }
 

    public function toDatabase($notifiable)
    {
        return [ $this->data ];
    }
}
