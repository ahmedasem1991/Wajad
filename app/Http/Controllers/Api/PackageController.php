<?php

namespace App\Http\Controllers\Api;

use App\Package;
use App\Services\Filters\QRCodeFilters\InStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\PackageResource;
use App\Qrcode;

/**
 * @group Packages
 */
class PackageController extends Controller
{
    /**
     * Packages
     * @bodyParam token Barier-token required
     * @response
     * {
     *    "data": [
     *     {
     *      "id": 12,
     *      "name": "Platinum Package",
     *     "description": "Get 25 QrCodes As Sticker To Sticker it on any item to protect it Activated for one year.",
     *    "qrcodes_count": 1500,
     *   "price": 1500,
     *  "currency": "USD",
     *     "period": "12 days",
     *    "type": "single",
     *   "incrementally": true
     * }
     * ]
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        return PackageResource::collection(Package::where('quantity','<',Qrcode::withFilters(new InStock)->count())->paginate(env('PAGINATION_PER_PAGE', 15), '*', 'per_page'));
    }
}
