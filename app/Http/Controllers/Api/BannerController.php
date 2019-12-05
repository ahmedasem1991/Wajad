<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;

/**
 * @group Home
 */
class BannerController extends Controller
{
    /**
     * Banners
     *      {
     *       "data": [
     *        {
     *         "type": "url",
     *        "image": "http:\/\/wajad.test\/ddd",
     *       "url": "c dvd"
     *    }
     *  ]
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        return BannerResource::collection(Banner::all());
    }
}
