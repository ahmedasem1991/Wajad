<?php

namespace App\Http\Controllers\Api;

use App\Setting;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Page;

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

    public function __invoke($page = null)
    {
        if (!in_array($page, $this->pages)) {
            throw new ApiException(trans(''), 404);
        }

        return new SettingResource(Page::where('key', $page)->first());
    }
}
