<?php

namespace App\Http\Controllers\Api\Auth;


use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;

/**
 * @group Items
 */
class UserItemController extends Controller
{


    /**
     * User Items
     * @response 
     *  {
     *    "data": [
     *      {
     *        "id": 2,
     *       "title": "hiughiu",
     *   "details": "oihiojjjjjjjjjjjjjjhioj",
     * "status": "found",
     *"owner": {
     *  "id": 2,
     *"name": "User",
     *         "email": "user@nova.com",
     *       "status": 1,
     *     "mobile_number": "01142416124",
     *   "receive_emails": false,
     * "receive_push_notifications": false,
     *                "is_email_verified": false,
     *              "is_mobile_number_verified": false,
     *            "default_distance_unit": "kilo"
     *       },
     *   "model": {
     *     "id": 1,
     *   "name": "jhinoi",
     * "description": "pjipo",
     * "image": "http://wajad.test/images/default.png"
     *       },
     *     "color": {
     *       "id": 1,
     *     "name": "Red",
     *   "icon": "images/colors/red.png"
     * },
     *"brand": {
     *  "id": 1,
     *"name": "pojmop",
     *"description": "ijoi",
     *"image": "http://wajad.test/images/default.png"
     *},
     *"date": "2019-12-04 14:23:43",
     *"images": []
     *}
     *]
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        return ItemResource::collection(auth('api')->user()->items()->get());
    }
}
