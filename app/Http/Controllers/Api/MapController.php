<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Corporate;
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
        'office',
        'all'
    ];
    /**
     * Map
     * @urlParam type required in:lost,found,office,all
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
     *      "name": "Error cumque sit culpa quibusdam aut sunt nemo.",
     *      "details": "Quis voluptate perspiciatis officia omnis veritatis id. Voluptas culpa molestiae beatae corporis saepe quos iusto. Molestiae enim optio maiores dolor sit soluta. Aliquid commodi pariatur aliquid. Fugiat animi eos sapiente dolor possimus. Ut quo voluptatem nobis eos. Vitae nulla illum debitis consequuntur quaerat deserunt. Suscipit cum earum et et consectetur et. Tempore voluptates dolore ratione eveniet molestiae ullam. Est qui sit totam modi voluptas omnis officia. Illum nostrum vel unde iusto. Animi reiciendis odio et repellendus rem id. Qui deserunt rerum explicabo est dolorem dolorem nulla. Ratione dolorem libero doloremque laboriosam temporibus autem veniam corrupti. Accusantium ad autem excepturi quasi minus. Eveniet velit rem numquam ipsum. Voluptatibus eligendi nihil dolor hic perspiciatis. Qui omnis est voluptatem assumenda. Debitis fuga est blanditiis dolorem nihil impedit. Nihil est illum cupiditate unde beatae suscipit labore. Et alias eligendi sed quam blanditiis consequatur.",
     *      "latitude": -47.854138,
     *      "longitude": -18.526692,
     *      "image": "http://wajad.test/",
     *      "address": ""
     *      "type": "lost"
     *      "post": {
     *          "id": 3,
     *          "title": "jndfhjjdfghdfg",
     *          "approval_status": 1,
     *          "longitude": 39.4913431,
     *          "latitude": 21.4498898,
     *          "reward": null,
     *          "description": "dfghdtghsefgfgsdfgsdfg",
     *          "status": "found",
     *          "attached_to_item": false,
     *          "item": null,
     *          "sub_category": {
     *          "id": 2,
     *          "name": "shoes",
     *          "description": null,
     *          "image": "http://wajad.test//images/default.png"
     *          },
     *          "model": {
     *          "id": 5,
     *          "name": "Sony SA1",
     *          "description": "",
     *          "image": "http://wajad.test//images/posts/post6.jpg"
     *          },
     *          "brand": {
     *          "id": 4,
     *          "name": "corocs",
     *          "description": "",
     *          "image": "http://wajad.test//images/posts/post7.jpg"
     *          },
     *          "color": {
     *          "id": 13,
     *          "name": "Others",
     *          "icon": "images/profile/default-profile.png"
     *          },
     *          "date": "2020-07-11 18:51:33",
     *          "images": [
     *          "/images/screenshot-from-2020-08-26-16-08-02-1599649865-vqZeC.png"
     *          ],
     *          "questions": [
     *          {
     *          "id": 13,
     *          "question": "asdffasedfasdfa",
     *          "answer": null
     *          },
     *          {
     *          "id": 14,
     *          "question": "adgfbhdfhnjdfghdfg",
     *          "answer": null
     *          },
     *          {
     *          "id": 15,
     *          "question": "dfgndfgsdfbsd",
     *          "answer": null
     *          }
     *          ],
     *          "allow_post_requests": false,
     *          "claimers": [],
     *          "city": null,
     *          "publisher": {
     *          "id": 2,
     *          "name": "WAJAD Corporate",
     *          "email": "corporate@wajad.com",
     *          "status": 1,
     *          "mobile_number": "",
     *          "mobile_country_id": 1,
     *          "mobile_country_code": "93",
     *          "receive_emails": false,
     *          "receive_push_notifications": false,
     *          "is_email_verified": false,
     *          "is_mobile_number_verified": false,
     *          "default_distance_unit": "kilo",
     *          "quick_user_id": null,
     *          "quick_user_email": "corporate@wajad.com",
     *          "quick_user_password": null,
     *          "image": "http://wajad.test/images/profile/default-profile.png",
     *          "country": {
     *          "id": 1,
     *          "name_ar": "أفغانستان",
     *          "name_en": "Afghanistan",
     *          "iso_code": "AF",
     *          "country_code": "93",
     *          "deleted_at": null,
     *          "created_at": null,
     *          "updated_at": null
     *          }
     *          },
     *          "corporate": {
     *          "id": 1,
     *          "name": "WAJAD Corporate",
     *          "address": "Jadda - KSA",
     *          "details": "WAJAD Corporate For Haj & Omra",
     *          "mobile_number": ""
     *          }
     *          },
     *}
     *]
     *}
     */
    public function __invoke(Request $request, $type = null)
    {
        $validate_request = Validator::make($request->all(), [
            // 'longitude' => ['required', 'regex:/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,9})?))$/'],
            // 'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude' => ['required'],
            'latitude' => ['required'],
            'radius' => ['required', 'integer'],
            'unit' => ['required', 'in:kilo,mile']
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if (in_array($type, self::TYPES)) {
            return $this->$type($request);
        }
        throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.page')]), 404);
    }

    private function all(Request $request)
    {
        $all = Post::isShow()->get();
        $items = $this->getItemsBasedOnLocation($request, $all);
        $office = Corporate::active()->get();
        $office = $this->getItemsBasedOnLocation($request, $office);
        $data = $items->merge($office);
        return MapResource::collection($data);
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
        $office = Corporate::active()->get();

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
