<?php

namespace App\Providers;

use Auth;
use App\Corporate;
use App\WajadOffice;
use Laravel\Nova\Nova;
use App\Nova\Metrics\Posts;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\QrCodes;
use App\Nova\Metrics\PostsCount;
use App\Nova\Metrics\UsersTypes;
use App\Nova\Metrics\QRCodeCount;
use App\Nova\Metrics\UsersStatus;
use App\Nova\Metrics\UsersActivity;
use Illuminate\Support\Facades\Gate;
use Smartappco\GoogleMaps\GoogleMaps;
use Remipou\NovaPageManager\PageResource;
use Kristories\QrcodeManager\QrcodeManager;
use Anaseqal\NovaSidebarIcons\NovaSidebarIcons;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot()
    {
        parent::boot();

    }

    protected function resources()
    {
        if(Auth()->user()->isAdmin())
        {
            Nova::resourcesIn(app_path('Nova'));
        }

        if(Auth()->user()->isCorporateAdmin())
        {
            Nova::resourcesIn(app_path('NovaCorporate'));
        }
 
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
           if(Auth()->user()->isAdmin())
           {
            return $user->isAdmin();
           }
           if(Auth()->user()->isCorporateAdmin())
           {
            return $user->isCorporateAdmin();
           }
         });
    }

    protected function cards()
    {
        $Corporates=Corporate::all();
        $Offices=WajadOffice::all();
        if(Auth()->user()->isAdmin())
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
               ( new GoogleMaps)
               ->markers($Corporates)
               ->offices($Offices),
              
            ];
        }

        if(Auth()->user()->isCorporateAdmin())
        {
            return[

            ];
        }


    }

    public function tools()
    {
        return [
            new NovaSidebarIcons,
        ];
    }

    public function register()
    {
        //
    }
}
