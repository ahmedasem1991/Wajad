<?php

namespace App\Notifications;

use App\Qrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Http\Request;

class ScanQRCodeNotification extends Notification
{
    use Queueable;
    private $lat,$lng;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lat, $lng)
    {
       $this->lat=$lat;
       $this->lng=$lng;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $GooleMap='https://www.google.com/maps/search/?api=1&query='
        .$this->lat
        .','.
        $this->lng;
        
        
 
        return (new MailMessage)
                    ->line('There Some One Scanned Your QR Code.')
                    ->action('Open Location', url($GooleMap))
                    ->line('Thank you for using WAJAD!');
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
