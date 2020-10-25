<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ContactusResource;
use App\Setting;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Page;
use Illuminate\Support\Arr;

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
        'terms',
        // 'facebook-link',
        // 'twitter-link',
    ];


    /**
     * Pages
     * @urlParam type required about-us or contact-us or privacy-policy or terms
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

    /**
     * Contact Us
     * @urlParam contact-us required
     * @urlParam about-us required
     * @urlParam privacy-policy required
     * @urlParam terms required
     * @response
     * {
     * "data contact-us": {
     * "Facebook-Link": "http://www.facebook.com",
     * "Twitter-Link": "http://www.twitter.com",
     * "Phone-Number-1": "+96611111111",
     * "Phone-Number-2": "+96622222222",
     * "Address1": "KSA / Jedda",
     * "Address2": "KSA / Jedda 2",
     * "Email1": "info@wajad.com",
     * "Email2": "info2@wajad.com"
     * }
     * }
     */
    public function __invoke($page = null)
    {
        if (!in_array($page, $this->pages)) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.page')]), 400);
        }
        if ($page == 'contact-us') {

            $data = [];

            $settings = Setting::get(['key', 'value']);

            foreach ($settings as $setting) {
                $data['data'][$setting['key']] = $setting['value'];
            }

            return response()->json($data);
        }
        if($page=='about-us')
        {

            return new PageResource(Page::where('key','about_us')->first());
        }

        if($page=='privacy-policy')
        {

            return new PageResource(Page::where('key','privacy-policy')->first());
        }
        if($page=='terms')
        {

            return new PageResource(Page::where('key','terms')->first());
        }

        return new PageResource(Page::whereKey($page)->first());
    }
}
