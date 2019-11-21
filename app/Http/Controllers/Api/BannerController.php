<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;

class BannerController extends Controller
{
    public function __invoke(Request $request)
    {
        return BannerResource::collection(Banner::all());
    }
}
