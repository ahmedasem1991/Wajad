<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Remipou\NovaPageManager\PageResource;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
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
   
protected function resources() {
    Nova::resourcesIn(app_path('Nova'));

    Nova::resources([
        PageResource::class,
    ]);
}

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \Vyuldashev\NovaPermission\NovaPermissionTool::make(),
            new \Bolechen\NovaActivitylog\NovaActivitylog(),
           // new \OptimistDigital\NovaPageManager\NovaPageManager,
            new \Mydnic\NovaKustomer\NovaKustomer,


        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
