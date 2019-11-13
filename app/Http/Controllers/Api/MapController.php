<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\WajadOffice;
use Illuminate\Http\Request;
use App\Helpers\Api\ResponseTrait;
use App\Http\Resources\MapResource;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    use ResponseTrait;

    const TYPES = [
        'lost',
        'found',
        'office'
    ];

    public function __invoke(Request $request, $type = null)
    {
        if (in_array($type, self::TYPES)) {
            return $this->$type($request);
        }

        $this->addStatusCode(404);

        return $this->response();
    }

    private function lost(Request $request)
    {
        $lost = Post::lost()->appearance()->get();

        if ($request->has('distance')) {
            $lost = $this->getItemsBasedOnLocation($request, $lost);
        }

        return MapResource::collection($lost);
    }

    private function found(Request $request)
    {
        $found = Post::found()->appearance()->get();

        if ($request->has('distance')) {
            $found = $this->getItemsBasedOnLocation($request, $found);
        }

        return MapResource::collection($found);
    }

    private function office($request)
    {
        $office = WajadOffice::active()->get();

        if ($request->has('distance')) {
            $office = $this->getItemsBasedOnLocation($request, $office);
        }

        return MapResource::collection($office);
    }

    private function getItemsBasedOnLocation(Request $request, $items)
    {
        ($request->unit == 'mile') ? $request->merge(['distance' => $request->distance * 0.62137]) : $request->merge(['distance' => $request->distance]);

        return $items->filter(function ($items) use ($request) {
            $coordinate1 = new Coordinate($request->latitude, $items->latitude);
            $coordinate2 = new Coordinate($request->longitude, $request->longitude);
            $calculator  = new Vincenty();
            $items->distance = ($calculator->getDistance($coordinate1, $coordinate2)) / 1000;
            return $items->distance < $request->distance;
        });
    }
}
