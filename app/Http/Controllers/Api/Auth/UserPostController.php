<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

/**
 * @group Posts
 */
class UserPostController extends Controller
{
    const TYPES = [
        'lost',
        'found',
    ];

    /**
     * User Posts
     *
     * @urlParam type required lost or found. Example:found.
     *
     * @bodyParam token Barier-token required
     *
     * @response
     *  {
     * "data": [
     *  {
     *   "id": 3,
     *  "title": "Quibusdam aliquid omnis quia quibusdam molestiae placeat voluptatum consequatur.",
     * "approval_status": 1,
     *"reward": 0,
     *"description": "Repudiandae sequi enim aut et praesentium adipisci. Expedita deleniti explicabo aspernatur labore occaecati quidem unde sequi. Non omnis veritatis blanditiis harum perspiciatis cum sint. Et dignissimos temporibus ut excepturi. Molestiae eos qui occaecati iste. Accusantium enim quo rerum. Dignissimos omnis rerum voluptatem fugiat id. Ad optio blanditiis quis placeat. Officiis illum id sint omnis. Quisquam tempore beatae nesciunt. Reprehenderit sed quo est nobis excepturi nisi. Non nihil dignissimos alias totam. Adipisci occaecati accusantium illum itaque velit unde. Autem voluptas voluptatem qui commodi inventore ullam quia.",
     *"status": "found",
     *"attached_to_item": true,
     *"item": {
     * "id": 1,
     *"title": "poj",
     *"details": "pokpo",
     *"status": "found",
     *"owner": {
     * "id": 2,
     * "name": "User",
     *"email": "user@nova.com",
     *"status": 1,
     *"mobile_number": "01142416124",
     *"receive_emails": false,
     *"receive_push_notifications": false,
     *"is_email_verified": false,
     *"is_mobile_number_verified": false,
     *"default_distance_unit": "kilo"
     *},
     *"model": {
     *  "id": 3,
     *  "name": "Explicabo rerum ut et dolores officiis et.",
     *  "description": "Laudantium fugit ut harum magnam magnam deserunt.",
     *  "image": "http:\/\/wajad.test\/default-icon.png"
     *},
     * "color": {
     *   "id": 1,
     *   "name": "Red",
     *  "icon": "images\/colors\/red.png"
     *},
     * "brand": {
     *  "id": 2,
     * "name": "Et dicta similique adipisci ut autem deleniti qui.",
     * "description": "Facilis incidunt dolores consequatur quis aliquam quia voluptatem.",
     * "image": "http:\/\/wajad.test\/\/tmp\/4886df1c2c60650759bf348635be787a.jpg"
     *},
     *"date": "2019-12-13 00:00:00",
     *"images": [
     *}
     * @return void
     */
    public function __invoke(Request $request, $type)
    {
        if (! in_array($type, self::TYPES)) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.post')]), 400);
        }

        return PostResource::collection(auth('api')->user()->posts()->$type()->orderBy('id', 'desc')->get());
    }
}
