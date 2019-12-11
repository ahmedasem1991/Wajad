<?php

namespace App\Http\Controllers\Api;

use App\Setting;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Page;

/**
 * @group Pages
 */
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
     * Pages
     * @urlParam type required about-us or contact-us or privacy-policy
     * @response 
     * {
     * "data": {
     *  "id": 1,
     * "page": "about-us",
     *"title": "okpokmj",
     *"body": "ppojpoj"
     *}
     *}
     * @return void
     */

    public function __invoke($page = null)
    {
        if (!in_array($page, $this->pages)) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.page')]), 404);
        }

        return new PageResource(Page::whereKey($page)->first());
    }
}
