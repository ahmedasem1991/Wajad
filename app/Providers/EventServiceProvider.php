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
        'App\Events\AddPostEvent' => [
            'App\Listeners\AddPostListener',
        ],
        'App\Events\SendFCMEvent' => [
            'App\Listeners\SendFCMListener',
        ],
        'App\Events\SendSMSEvent' => [
            'App\Listeners\SendSMSListener',
        ],
        'App\Events\ClosePostEvent' => [
            'App\Listeners\ClosePostListener',
        ],
        'App\Events\OpenPostEvent' => [
            'App\Listeners\OpenPostListener',
        ],

        'App\Events\ShowPostEvent' => [
            'App\Listeners\ShowPostListener',
        ],

        'App\Events\HiddenPostEvent' => [
            'App\Listeners\HiddenPostListener',
        ],

        'App\Events\ApprovePostEvent' => [
            'App\Listeners\ApprovePostListener',
        ],

        'App\Events\RejectPostEvent' => [
            'App\Listeners\RejectPostListener',
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
        parent::boot();

        //
    }
}
