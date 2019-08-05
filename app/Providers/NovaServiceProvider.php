<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\PostsCount;
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
        \Spatie\NovaTranslatable\Translatable::defaultLocales(['en', 'ar']);

        // \OptimistDigital\NovaPageManager\NovaPageManager::configure([
        //     'templates' => [
        //         \App\Nova\Templates\AboutUs::class
        //     ],
        //     'locales' => [
        //         'en_US' => 'English',
        //         'ar_EG' => 'Arabic'
        //     ]
        // ]);
    }

    protected function resources()
    {
        Nova::resourcesIn(app_path('Nova'));

        Nova::resources([
            PageResource::class,
        ]);
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
            new \Itainathaniel\NovaNexmo\NovaNexmoCard(),
        ];
    }

    public function tools()
    {
        return [
            \Vyuldashev\NovaPermission\NovaPermissionTool::make(),
            new \Mydnic\NovaKustomer\NovaKustomer,
            new \Kristories\QrcodeManager\QrcodeManager(),
            new \Themsaid\CashierTool\CashierTool(),
            new \Tightenco\NovaStripe\NovaStripe,
            new \Themsaid\CashierTool\CashierTool(),
            new \Itainathaniel\NovaNexmo\NovaNexmoTool(),
        ];
    }

    public function register()
    {
        //
    }
}
