<?php

namespace App\Providers;

use App\Exceptions\Api\ApiException;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $api_namespace = 'App\Http\Controllers\Api';

    protected $corporate_namespace = 'App\Http\Controllers\Corporate';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->mapApiRoutes();

            $this->mapWebRoutes();

            $this->mapCorporateRoutes();

            //
        });
        Route::bind('qr_code', function ($qr_code) {
            $qr_code = \App\Qrcode::where('qrcode_url', $qr_code)->first();
            if (! $qr_code) {
                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 400);
            }

            return $qr_code;
        });

        Route::bind('post', function ($post) {
            $post = \App\Post::whereId($post)->first();
            if (! $post) {
                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.post')]), 400);
            }

            return $post;
        });
        Route::bind('item', function ($item) {
            $item = \App\Item::whereId($item)->first();
            if (! $item) {
                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.item')]), 400);
            }

            return $item;
        });
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
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
            ->domain(env('API_URL', 'api-wajad.smartappco.dev'))
            ->group(base_path('routes/api.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
