<?php

namespace App\Notifications;

use Coreproc\NovaNotificationFeed\Notifications\NovaBroadcastMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class BroadcastNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $level;

    protected $message;

    protected $url;

    /**
     * Create a new notification instance.
     */
    public function __construct($level, $message, $url)
    {
        $this->level = $level;
        $this->message = $message;
        $this->url = $url;
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
            'broadcast',
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
            'level' => $this->level,
            'message' => $this->message,
            'url' => $this->url,
            'target' => '_self',
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'level' => $this->level,
            'message' => $this->message,
            'url' => $this->url,
            'target' => '_self',
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
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
