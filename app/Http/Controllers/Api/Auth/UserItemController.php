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
     * @bodyParam token Barier-token required
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
     *  "qrcode": {
     *          "id": 1,
     *         "url": "http://api.wajad.test/api/scan-qr-code",
     *        "user": null,
     *       "item": {
     *          "id": 1,
     *         "title": "Porro est dolores at perferendis tempora.",
     *        "details": "Corrupti velit alias sit a omnis illo. Soluta veritatis nihil incidunt at sit illum ad. Et voluptas earum explicabo cum sunt. Impedit ullam aliquam velit excepturi soluta. Quae atque ut perspiciatis magni. Eligendi error eius sit. Fuga minus voluptatem harum veritatis mollitia deleniti. Sequi eligendi voluptatem minus ipsum cum non ut. Eos veniam quia et est. Qui non nemo eum ducimus. Aut non ducimus et aut. Ea repellendus eaque nostrum quidem mollitia quaerat. Aliquid qui ut beatae et quidem iure quod dolor. Minima porro iure autem distinctio temporibus ut nobis. Hic accusamus veniam voluptas ipsum quisquam. Suscipit omnis id sed in. Reprehenderit cum dolorem adipisci earum sunt ullam. Est debitis numquam voluptatem dicta quia est dolore officia. Quia ducimus qui dolor esse ea eius. Velit itaque consequatur cum eaque consequatur.",
     *       "status": 3,
     *      "owner_id": 4,
     *     "model_id": 6,
     *    "color_id": 13,
     *   "sub_category_id": null,
     *  "brand_id": null,
     * "deleted_at": null,
     *"created_at": "2019-12-10 17:20:28",
     *"updated_at": "2019-12-10 17:20:28"
     *}
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
