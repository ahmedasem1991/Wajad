<?php

namespace App\Http\Controllers\Api;

use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\PackageResource;

class PackageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return PackageResource::collection(Package::paginate(env('PAGINATION_PER_PAGE', 15), '*', 'per_page'));
    }
}
