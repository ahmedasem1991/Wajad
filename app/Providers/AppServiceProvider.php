<?php

namespace App\Providers;

use App\Subscription;
use Illuminate\Support\Facades\Schema;
use App\Observers\SubscriptionObserver;
use Illuminate\Support\ServiceProvider;

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
    }
}
