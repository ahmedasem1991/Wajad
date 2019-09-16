<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use App\Http\Resources\SettingResource;

class PageController extends Controller
{
    /**
     * Define Pages To Be Visible Based On Key in DB
     *
     * @var array
     */
    protected $pages = [
        'about-us',
        'contact-us',
        'privacy-policy',
        // 'facebook-link',
        // 'twitter-link',
    ];
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($page = null)
    {
        if ($page && in_array($page, $this->pages)) {
            return new SettingResource(Settings::where('key', $page)->first());
        }
        abort(404);
    }
}
