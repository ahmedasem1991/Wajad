<?php

namespace App\Observers;

use App\AdminNotification;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\Topics;
use App\Jobs\SendAdminNotificationJob;
 
use LaravelFCM\Message\PayloadNotificationBuilder;

class NotificationObserver
{

    public function saving(AdminNotification $Notification)
    {
        SendAdminNotificationJob::dispatch($Notification->body,$Notification->send_to,$Notification->send_by,$Notification->users);
    }
    /**
     * Handle the admin notification "created" event.
     *
     * @param  \App\AdminNotification  $adminNotification
     * @return void
     */
    public function created(AdminNotification $adminNotification)
    {
        //
    }

    /**
     * Handle the admin notification "updated" event.
     *
     * @param  \App\AdminNotification  $adminNotification
     * @return void
     */
    public function updated(AdminNotification $adminNotification)
    {
        //
    }

    /**
     * Handle the admin notification "deleted" event.
     *
     * @param  \App\AdminNotification  $adminNotification
     * @return void
     */
    public function deleted(AdminNotification $adminNotification)
    {
        //
    }

    /**
     * Handle the admin notification "restored" event.
     *
     * @param  \App\AdminNotification  $adminNotification
     * @return void
     */
    public function restored(AdminNotification $adminNotification)
    {
        //
    }

    /**
     * Handle the admin notification "force deleted" event.
     *
     * @param  \App\AdminNotification  $adminNotification
     * @return void
     */
    public function forceDeleted(AdminNotification $adminNotification)
    {
        //
    }
}
