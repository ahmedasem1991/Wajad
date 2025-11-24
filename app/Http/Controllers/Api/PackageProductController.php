<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageProductResource;
use App\PackageProductManagement;
use Illuminate\Http\Request;

class PackageProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return PackageProductResource::collection(PackageProductManagement::all());
    }
}
