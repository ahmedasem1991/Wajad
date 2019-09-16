<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use App\Nova\Metrics\Posts;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\PostsCount;
use App\Nova\Metrics\QRCodeCount;
use App\Nova\Metrics\QrCodes;
use App\Nova\Metrics\UsersTypes;
use App\Nova\Metrics\UsersStatus;
use App\Nova\Metrics\UsersActivity;
use Illuminate\Support\Facades\Gate;
use Remipou\NovaPageManager\PageResource;
use Kristories\QrcodeManager\QrcodeManager;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot()
    {
        parent::boot();

    }

    protected function resources()
    {
        Nova::resourcesIn(app_path('Nova'));
         

        // Nova::resources([
        // PageResource::class,
        // ]);
    }

    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    protected function cards()
    {
        return [
            new UsersActivity,
           // new PostsCount,
            new UsersTypes,
            new UsersStatus,
            new Posts,
            new QrCodes,
            //new QRCodeCount,
            new \Marianvlad\NovaEnvCard\NovaEnvCard,
        ];
    }

    public function tools()
    {
        return [
        ];
    }

    public function register()
    {
        //
    }
}
