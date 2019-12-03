<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

/**
 * @group User Profile
 */
class UserPostController extends Controller
{
    const TYPES = [
        'lost',
        'found'
    ];

    /**
     * User Posts
     * @urlParam type lost or found. Example:found.
     * @response {
     * "data": [
     *   {
     *      "id": 1,
     *     "title": "Ex atque necessitatibus libero voluptatem magnam et.",
     *        "approval_status": 1,
     *       "reward": 0,
     *      "description": "Et ut quo non sapiente atque voluptatem accusamus. Explicabo voluptas et perferendis aut tempore qui temporibus. Ipsam impedit ipsa voluptates. Non quia non omnis quo aut. Quisquam voluptatem atque et deserunt dignissimos libero ut. Fuga ut ab delectus consequatur est neque. Delectus qui ea consequuntur quasi qui illo. Qui aperiam voluptas nobis voluptas fugiat. Et voluptates est amet. Nam vel voluptatem ab qui qui explicabo. Qui voluptates laboriosam quaerat sunt. Est vel natus vero et eaque autem ipsam sit.",
     *       "status": "found",
     *      "attached_to_item": false,
     *       "item": null,
     *      "subCategory": {
     *           "id": 105,
     *          "name": "Facilis velit soluta quidem modi quibusdam et.",
     *         "description": "Rerum quidem consequatur officiis et et aut earum.",
     *        "image": "http://wajad.test/default-icon.png"
     *   },
     *  "model": {
     *     "id": 52,
     *    "name": "Hic veritatis recusandae et eveniet aperiam tenetur.",
     *   "description": "Facere culpa voluptatem quos illum repellendus expedita.",
     *  "image": "http://wajad.test/default-icon.png"
     *},
     *"color": {
     *   "id": 1,
     *  "name": "Red",
     * "icon": "images/colors/red.png"
     * },
     *"date": "2019-12-03 17:33:55",
     *"images": [
     *   {
     *      "id": 1,
     *     "image": "http://wajad.test/image.png\r\n"
     *}
     *],
     *"questions": [
     *   {
     *      "id": 1,
     *     "founder_id": {
     *        "id": 2,
     *       "name": "User",
     *      "email": "user@nova.com",
     *     "status": 1,
     *    "mobile_number": "01142416124",
     *   "receive_emails": false,
     *  "receive_push_notifications": false,
     * "is_email_verified": false,
     *"is_mobile_number_verified": false,
     *"default_distance_unit": "kilo"
     *},
     *"question": "question1\r\n"
     *}
     *],
     *"city": {
     *   "id": 1,
     *  "name": "Al Riyadh"
     *}
     *}
     *]
     * }
     * @return void
     */
    public function __invoke(Request $request, $type)
    {
        if (!in_array($type, self::TYPES)) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.post')]), 404);
        }

        return PostResource::collection(auth('api')->user()->posts()->$type()->get());
    }
}
