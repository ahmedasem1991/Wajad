<?php

namespace App\Providers;

use App\Exceptions\Api\ApiException;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';
    protected $api_namespace = 'App\Http\Controllers\Api';
    protected $corporate_namespace = 'App\Http\Controllers\Corporate';
    public function boot()
    {
        Route::bind('qr_code', function ($qr_code) {
            return \App\Qrcode::where('qrcode_url', $qr_code)->first() ?? abort(404);
        });
        
        Route::bind('post', function ($post) {
            $post = \App\Post::whereId($post)->first();
            if (!$post) {
                throw new ApiException(trans('messages.not_found'), 404);
            }
            return $post;
        });
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapCorporateRoutes();

        //
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
        // config(['nova.domain' =>env('ADMIN_URL', '/')]);
        // config(['nova.url' =>env('ADMIN_URL', '/')]);
        // config(['nova.path' =>'wajad']);
    }

    protected function mapCorporateRoutes()
    {
        Route::prefix('corporate')
            ->as('corporate.')
            ->middleware('web')
            ->domain(env('CORPORATE_URL', 'corporate-wajad.smartappco.net'))
            ->namespace($this->corporate_namespace)
            ->group(base_path('routes/corporate.php'));

        //  config(['nova.domain' =>env('CORPORATE_URL', '/')]);
        //  config(['nova.url' =>env('CORPORATE_URL', '/')]);
        //  config(['nova.path' =>'CORPORATE']);

    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->as('api.')
            ->middleware('api')
            ->domain(env('API_URL', 'api-wajad.smartappco.net'))
            ->namespace($this->api_namespace)
            ->group(base_path('routes/api.php'));
    }
}
