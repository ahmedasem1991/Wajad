<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\WajadOffice;
use Location\Coordinate;
use Illuminate\Http\Request;
use Location\Distance\Vincenty;
use App\Helpers\Api\ResponseTrait;
use App\Http\Resources\MapResource;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
 * @group Map
 */
class MapController extends Controller
{
    use ResponseTrait;

    const TYPES = [
        'lost',
        'found',
        'office'
    ];
    /**
     * Map
     * @urlParam type required in:lost,found,office
     * @bodyParam longitude string required
     * @bodyParam latitude string required
     * @bodyParam radius int required
     * @bodyParam unit string,in:kilo,mile required
     *
     * @response
     * {
     *"data": [
     *   {
     *      "id": 1,
     *     "name": "Error cumque sit culpa quibusdam aut sunt nemo.",
     *    "details": "Quis voluptate perspiciatis officia omnis veritatis id. Voluptas culpa molestiae beatae corporis saepe quos iusto. Molestiae enim optio maiores dolor sit soluta. Aliquid commodi pariatur aliquid. Fugiat animi eos sapiente dolor possimus. Ut quo voluptatem nobis eos. Vitae nulla illum debitis consequuntur quaerat deserunt. Suscipit cum earum et et consectetur et. Tempore voluptates dolore ratione eveniet molestiae ullam. Est qui sit totam modi voluptas omnis officia. Illum nostrum vel unde iusto. Animi reiciendis odio et repellendus rem id. Qui deserunt rerum explicabo est dolorem dolorem nulla. Ratione dolorem libero doloremque laboriosam temporibus autem veniam corrupti. Accusantium ad autem excepturi quasi minus. Eveniet velit rem numquam ipsum. Voluptatibus eligendi nihil dolor hic perspiciatis. Qui omnis est voluptatem assumenda. Debitis fuga est blanditiis dolorem nihil impedit. Nihil est illum cupiditate unde beatae suscipit labore. Et alias eligendi sed quam blanditiis consequatur.",
     *   "latitude": -47.854138,
     *  "longitude": -18.526692,
     * "image": "http://wajad.test/",
     *"address": ""
     *}
     *]
     *}
     */
    public function __invoke(Request $request, $type = null)
    {
        $validate_request = Validator::make($request->all(), [
            'longitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'radius' => ['required', 'integer'],
            'unit' => ['required', 'in:kilo,mile']
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if (in_array($type, self::TYPES)) {
            return $this->$type($request);
        }
        throw new ApiException(trans('messages.notfound', ['model' => trans('messages.attributes.page')]), 404);
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
            return $item->distance < (int) $request->radius;
        });
    }
}
