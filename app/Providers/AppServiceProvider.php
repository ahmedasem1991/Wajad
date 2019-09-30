<?php

namespace App\Providers;

use App\Qrcode;
use App\AssignQrcode;
use App\Subscription;
use App\QrcodeRequest;
use App\GenerateQrcode;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
use App\Observers\QrcodeAssignObserver;
use App\Observers\SubscriptionObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\QrcodeRequestObserver;
use App\Observers\QrcodeGenerateObserver;
use App\Jobs\GenerateQrcodeJob;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::enableForeignKeyConstraints();

        Subscription::observe(SubscriptionObserver::class);
        QrcodeRequest::observe(QrcodeRequestObserver::class);
        GenerateQrcode::observe(QrcodeGenerateObserver::class);
        AssignQrcode::observe(QrcodeAssignObserver::class);
        // Queue::after(function (GenerateQrcodeJob $event) {
        // $event->generateQrcode->status='finished';
        // $event->generateQrcode->update();
        // logger('test');
        // });
    }
}
