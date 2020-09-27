<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Services\Helpers\Traits\Visitable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;

/**
 * @group Home
 */
class BannerController extends Controller
{
    use Visitable;
    /**
     * Banners
     * @response
     *      {
     *       "data": [
     *        {
     *         "type": "url",
     *        "image": "http:\/\/wajad.test\/ddd",
     *       "url": "c dvd",
     * "item_id":null,
     * "item": null
     *    },
     * {
     *   "type": "item",
     *        "image": "http:\/\/wajad.test\/ddd",
     *       "url": "c dvddfefe",
     * "item_id":"1",
     * "item":{
     *   "latitude"  :"30.1111111",
     *      "longitude"  : "30.1111111",
     *     "name" : "khoih",
     *    "description"  : "jgiugiugiu",
     *   "city" : "Cairo",
     *  "date": "2019-12-12 11:12:05"
     *}
     * }
     *  ]
     *}
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(Request $request,Banner $banner = null)
    {
        if ($banner){
            $this->bootVisitable($banner);
            $banner->increment('clicks');
            return new BannerResource($banner);
        }
        return BannerResource::collection(Banner::available()->orderBy('order', 'asc')->get());
    }
}
