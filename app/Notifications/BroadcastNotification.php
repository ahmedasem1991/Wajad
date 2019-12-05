<?php

namespace App\Notifications;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Coreproc\NovaNotificationFeed\Notifications\NovaBroadcastMessage;

class BroadcastNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $level,$message,$url;
   

    /**
     * Create a new notification instance.
     *
     * @param $level
     * @param $message
     * @param $url
     */
    public function __construct($level, $message ,$url)
    {
        $this->level = $level;
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'database',
            'broadcast',
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'level' => $this->level,
            'message' => $this->message,
            'url' => $this->url,
            'target' => '_self'
        ];
    }

    
    public function toDatabase($notifiable)
    {
        return [
            'level' => $this->level,
            'message' => $this->message,
            'url' => $this->url,
            'target' => '_self'
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new NovaBroadcastMessage($this->toArray($notifiable));
    }

    //     public function broadcastOn()
    // {
    //     return 'nova-notifications';
    // }

    // public function broadcastAs()
    // {
    //     return 'broadcast-notification-created';
    // }
    
}
