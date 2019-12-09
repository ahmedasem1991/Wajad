<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\ApiException;
use App\Post;
use App\SubCategory;
use App\Helpers\Api\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\SubCategoryPostResource;

/**
 * @group Home
 */
class SubCategoryPostController extends Controller
{
    use ResponseTrait;

    const TYPES = [
        'lost',
        'found'
    ];

    /**
     * Posts
     * @urlParam status required string lost or found
     * @urlParam subcategory_id int, sub_category_id, exists in sub_categories  Example: 1
     * @response 
     * {
     *"data": [
     * {
     *  "id": 1,
     * "subCategoryName": "opjmp",
     *"subCategoryIcon": "http:\/\/wajad.test\/images\/default.png",
     *      "subCategoryPostsCount": 3
     *   }
     * ],
     *"parentCategory": {
     * "subCategoryName": "All",
     *"subCategoryIcon": "http:\/\/wajad.test\/subcategories\/all.png",
     *"subCategoryPostsCount": 3
     *},
     
     * "posts": [
     *  {
     *   "id": 3,
     *  "title": "Quibusdam aliquid omnis quia quibusdam molestiae placeat voluptatum consequatur.",
     * "approval_status": 1,
     * "reward": 0,
     * "description": "Repudiandae sequi enim aut et praesentium adipisci. Expedita deleniti explicabo aspernatur labore occaecati quidem unde sequi. Non omnis veritatis blanditiis harum perspiciatis cum sint. Et dignissimos temporibus ut excepturi. Molestiae eos qui occaecati iste. Accusantium enim quo rerum. Dignissimos omnis rerum voluptatem fugiat id. Ad optio blanditiis quis placeat. Officiis illum id sint omnis. Quisquam tempore beatae nesciunt. Reprehenderit sed quo est nobis excepturi nisi. Non nihil dignissimos alias totam. Adipisci occaecati accusantium illum itaque velit unde. Autem voluptas voluptatem qui commodi inventore ullam quia.",
     * "status": "found",
     * "attached_to_item": true,
     * "item": {
     *   "id": 1,
     *   "title": "poj",
     *   "details": "pokpo",
     *  "status": "found",
     *  "owner": {
     *    "id": 2,
     *    "name": "User",
     *    "email": "user@nova.com",
     *    "status": 1,
     *    "mobile_number": "01142416124",
     *   "receive_emails": false,
     *  "receive_push_notifications": false,
     * "is_email_verified": false,
     *         "is_mobile_number_verified": false,
     *        "default_distance_unit": "kilo"
     *     },
     *    "model": {
     *     "id": 3,
     *    "name": "Explicabo rerum ut et dolores officiis et.",
     *   "description": "Laudantium fugit ut harum magnam magnam deserunt.",
     *  "image": "http:\/\/wajad.test\/default-icon.png"
     *},
     * "color": {
     *  "id": 1,
     * "name": "Red",
     *"icon": "images\/colors\/red.png"
     * },
     * "brand": {
     *   "id": 2,
     *  "name": "Et dicta similique adipisci ut autem deleniti qui.",
     * "description": "Facilis incidunt dolores consequatur quis aliquam quia voluptatem.",
     * "image": "http:\/\/wajad.test\/\/tmp\/4886df1c2c60650759bf348635be787a.jpg"
     *},
     *"date": "2019-12-13 00:00:00",
     *"images": []
     * },
     * "sub_category": {
     *   "id": 5,
     *  "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
     * "description": "Quia impedit hic nesciunt quis eum.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     *},
     *"model": {
     *  "id": 3,
     * "name": "Explicabo rerum ut et dolores officiis et.",
     *"description": "Laudantium fugit ut harum magnam magnam deserunt.",
     *"image": "http:\/\/wajad.test\/default-icon.png"
     * },
     * "color": null,
     *"date": "2019-12-08 15:40:37",
     *"images": [],
     *"post_requests": [
     *  {
     *   "id": 3,
     *  "is_request_valid": 0,
     * "cliamers": {
     *  "questions": [
     *   {
     *    "id": 1,
     *   "question": "kp'[k'[p\r\n",
     *  "answers": [
     *   {
     *    "id": 1,
     *   "answer": ";lokpok",
     *  "date": "2019-12-10 00:00:00"
     *}
     *]
     *}
     *],
     *"id": 1,
     *"name": "Admin",
     * "email": "admin@nova.com",
     * "status": 1,
     * "mobile_number": "01111086890",
     * "receive_emails": false,
     * "receive_push_notifications": false,
     * "is_email_verified": false,
     * "is_mobile_number_verified": false,
     * "default_distance_unit": "kilo"
     *},
     * "date": "2019-12-10 00:00:00"
     *}
     *],
     *"city": {
     *  "id": 1,
     *  "name": "Al Riyadh"
     *}
     *}
     *]
     *}
     * @return void
     */

    # request to filter posts based on subcategories and previuos status
    public function index($status, $subcategory_id = null)
    {
        if (!in_array($status, self::TYPES)) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.category')]), 404);
        }

        $subCategory = SubCategory::whereHas($status . 'posts', function ($query) {
            return $query->isShow()->isOpen()->isApproved();
        })->get();

        $parentCategory = [
            'subCategoryName' => trans('keywords.all'),
            'subCategoryIcon' => env('APP_URL') . '/' . 'subcategories/all.png',
            'subCategoryPostsCount' => Post::$status()->isShow()->isOpen()->isApproved()->count(),
        ];

        $posts = Post::$status()->isShow()->isOpen()->isApproved()->where(function ($query) use ($subcategory_id) {
            if ($subcategory_id) {
                return $query->where('sub_category_id', $subcategory_id);
            }
        })->get();

        return SubCategoryPostResource::collection($subCategory)->additional([
            'parentCategory' => $parentCategory,
            'posts' => PostResource::collection($posts)
        ]);
    }
}
