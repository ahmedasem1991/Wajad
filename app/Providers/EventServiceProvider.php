<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\AddPostEvent::class => [
            \App\Listeners\AddPostListener::class,
        ],
        \App\Events\SendFCMEvent::class => [
            \App\Listeners\SendFCMListener::class,
        ],
        \App\Events\SendSMSEvent::class => [
            \App\Listeners\SendSMSListener::class,
        ],
        \App\Events\ClosePostEvent::class => [
            \App\Listeners\ClosePostListener::class,
        ],
        \App\Events\OpenPostEvent::class => [
            \App\Listeners\OpenPostListener::class,
        ],

        \App\Events\ShowPostEvent::class => [
            \App\Listeners\ShowPostListener::class,
        ],

        \App\Events\HiddenPostEvent::class => [
            \App\Listeners\HiddenPostListener::class,
        ],

        \App\Events\ApprovePostEvent::class => [
            \App\Listeners\ApprovePostListener::class,
        ],

        \App\Events\RejectPostEvent::class => [
            \App\Listeners\RejectPostListener::class,
        ],
        // \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        //     'SocialiteProviders\\Apple\\AppleExtendSocialite@handle',
        //     'SocialiteProviders\\Instagram\\InstagramExtendSocialite@handle',
        //     'SocialiteProviders\\Microsoft\\MicrosoftExtendSocialite@handle',
        //     'SocialiteProviders\\Twitter\\TwitterExtendSocialite@handle',
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

        //
    }
}
