<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\PostsCount;
use App\Nova\Metrics\UsersActivity;
use Illuminate\Support\Facades\Gate;
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
            new PostsCount,
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
