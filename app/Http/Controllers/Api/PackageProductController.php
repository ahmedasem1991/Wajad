<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\PackageProductManagement;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageProductResource;

class PackageProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return PackageProductResource::collection(PackageProductManagement::all());
    }
}
