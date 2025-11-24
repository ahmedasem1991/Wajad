<?php

namespace App\Providers;

use App\Exceptions\Api\ApiException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    protected $api_namespace = 'App\Http\Controllers\Api';

    protected $corporate_namespace = 'App\Http\Controllers\Corporate';

    public function boot()
    {
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
            ->domain(env('API_URL', 'api-wajad.smartappco.dev'))
            ->namespace($this->api_namespace)
            ->group(base_path('routes/api.php'));
    }
}
