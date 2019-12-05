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
     *   "id": 1,
     *  "title": "Eos laboriosam saepe placeat voluptas rerum alias maxime aliquam.",
     * "approval_status": 1,
     * "reward": 0,
     * "description": "Minus tempore laboriosam nesciunt consectetur ullam mollitia labore praesentium. Temporibus animi veritatis autem ut nulla et. Aspernatur quos est eum veniam aut excepturi. Dicta sed velit sed nobis. Beatae dolorem consequatur dolorem. Consequatur quis voluptatem et quo voluptatem et. Ea quibusdam sed est a ab quidem quo recusandae. Beatae et et exercitationem ut. Omnis dicta dolores exercitationem dolor corrupti sequi cupiditate. Vel qui ipsum illo nemo. Inventore molestiae error placeat laudantium. Laudantium quaerat et deserunt officia delectus rerum sint repellat. Sit eos nisi minima esse quas. Consequuntur expedita reprehenderit ipsum nihil dicta. Maxime nisi culpa vero non excepturi nihil. Vel est nam quibusdam. Quidem autem tempora animi iste. Incidunt sit molestiae aut in consequatur est sapiente corrupti. Rem est nesciunt velit dolores odio consequatur aut.",
     * "status": "found",
     * "attached_to_item": false,
     * "item": null,
     * "subCategory": {
     *   "id": 1,
     *  "name": "opjmp",
     * "description": "jmiojoi",
     * "image": "http:\/\/wajad.test\/images\/default.png"
     * },
     * "model": {
     *  "id": 1,
     * "name": "jhinoi",
     *"description": "pjipo",
     *       "image": "http:\/\/wajad.test\/images\/default.png"
     *    },
     *   "color": {
     *    "id": 1,
     *   "name": "Red",
     *  "icon": "images\/colors\/red.png"
     *},
     *"date": "2019-12-04 18:49:46",
     *"images": [],
     *"questions": [],
     * "city": null
     * },
     * {
     *  "id": 2,
     * "title": "Id consequatur et tenetur dolorum eveniet occaecati.",
     *"approval_status": 1,
     *"reward": 0,
     *"description": "Et quia molestiae voluptate veniam quia. Ducimus aut ipsam aut id quisquam nulla aut. A dolorum praesentium quo incidunt natus omnis. Animi dicta aut qui iure expedita. Dolores asperiores sed sint quia. Aspernatur veritatis non in exercitationem accusantium. Exercitationem eligendi et autem. Quibusdam quas ducimus atque quidem nobis nam. Eum cumque molestiae vero facilis odit quibusdam. Eveniet porro dolorem architecto esse amet in. Odio et nobis laborum. Delectus rerum a quam veritatis quaerat voluptates. Quis deserunt saepe asperiores. Dolore aut dolores voluptas sed quasi neque non. Ipsam ullam tenetur alias dolorem quibusdam ipsum. Sed doloribus fugit rem soluta ea facilis aut.",
     *"status": "found",
     *"attached_to_item": false,
     *"item": null,
     * "subCategory": {
     *   "id": 1,
     *  "name": "opjmp",
     * "description": "jmiojoi",
     * "image": "http:\/\/wajad.test\/images\/default.png"
     * },
     * "model": {
     *   "id": 3,
     *  "name": "Consectetur amet consequatur nulla numquam voluptatem earum.",
     * "description": "Temporibus omnis a corrupti.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     * },
     * "color": null,
     * "date": "2019-12-04 18:49:46",
     * "images": [],
     * "questions": [],
     * "city": null
     *  },
     *  {
     *    "id": 4,
     *   "title": "Quo cupiditate quod quae recusandae iure voluptas voluptas.",
     *  "approval_status": 1,
     * "reward": 0,
     * "description": "Dolorem libero vitae eos eveniet et repellat. Veritatis eos officiis quaerat esse reprehenderit quaerat non. Hic laboriosam tenetur asperiores nemo distinctio. Rerum libero dicta et pariatur. Eveniet repudiandae consequatur quasi vero. Sit sit sunt quasi esse et debitis. Placeat non porro molestiae. Porro reprehenderit voluptas modi dolorem et. Et rerum cupiditate tempora et saepe iusto est aut. Consectetur repellendus aliquam et non in optio. Ab rerum aliquam est aspernatur laudantium suscipit. Facilis quod sed accusamus sunt ducimus nulla. Incidunt quia eligendi aut ut praesentium culpa perferendis. Ut nihil doloribus dolores. Atque qui saepe et sunt enim architecto inventore consequatur. Fugiat temporibus voluptas voluptatem sed dolor officia. Et quibusdam provident repellendus facere. Voluptas voluptatem quis ut voluptatum deserunt. Nostrum ratione fugiat qui aut nihil. Et voluptatem adipisci impedit cumque recusandae. Ut consequatur delectus ea dolor labore quaerat. Quisquam quisquam non vel.",
     * "status": "found",
     * "attached_to_item": false,
     * "item": null,
     * "subCategory": {
     *   "id": 1,
     *  "name": "opjmp",
     * "description": "jmiojoi",
     *"image": "http:\/\/wajad.test\/images\/default.png"
     *},
     *"model": {
     *  "id": 5,
     * "name": "Id fugit corporis harum expedita.",
     * "description": "Fugiat nesciunt quasi sequi autem.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     *},
     *"color": null,
     * "date": "2019-12-04 18:49:46",
     * "images": [],
     * "questions": [],
     * "city": null
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
