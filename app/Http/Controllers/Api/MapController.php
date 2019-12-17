<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\WajadOffice;
use Location\Coordinate;
use Illuminate\Http\Request;
use Location\Distance\Vincenty;
use App\Helpers\Api\ResponseTrait;
use App\Http\Resources\MapResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $validate_request = Validator::make($request->all(), [
            'longitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'radius' => ['required', 'integer'],
            'unit' => ['required', 'in:kilo,mile']
        ]);

        if ($validate_request->fails()) {
            $this->addResponse($validate_request->errors()->first())->addStatusCode(400);

            return $this->response();
        }

        if (in_array($type, self::TYPES)) {
            return $this->$type($request);
        }

        $this->addStatusCode(404);

        return $this->response();
    }

    private function lost(Request $request)
    {
        $lost = Post::lost()->isShow()->get();

        $lost = $this->getItemsBasedOnLocation($request, $lost);

        return MapResource::collection($lost);
    }

    private function found(Request $request)
    {
        $found = Post::found()->isShow()->get();

        $found = $this->getItemsBasedOnLocation($request, $found);

        return MapResource::collection($found);
    }

    private function office($request)
    {
        $office = WajadOffice::active()->get();

        $office = $this->getItemsBasedOnLocation($request, $office);

        return MapResource::collection($office);
    }

    private function getItemsBasedOnLocation(Request $request, $items)
    {
        ($request->unit == 'mile') ? $request->merge(['radius' => $request->radius * 0.62137]) : $request->merge(['radius' => $request->radius]);

        return $items->filter(function ($item) use ($request) {
            $coordinate1 = new Coordinate($item->latitude, $item->longitude);
            $coordinate2 = new Coordinate($request->latitude, $request->longitude);
            $calculator  = new Vincenty();
            $item->distance = ($calculator->getDistance($coordinate1, $coordinate2)) / 1000;
            return $item->distance < $request->radius;
        });
    }
}
