<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Qrcode;
use App\ItemImage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\ItemService;
use Spatie\QueryBuilder\Filter;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * @group Items
 */
class ItemsController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        return ItemResource::collection(Item::all());
    }

    /**
     * Create Item
     * @bodyParam title min:6,max:255 required
     * @bodyParam details min:20,max:500 required
     * @bodyParam color_id exists:colors,id required
     * @bodyParam brand_id exists:brands,id required
     * @bodyParam model_id exists:models,id required
     * @bodyParam sub_category_id exists:sub_category,id required
     * @bodyParam qrcode_id exists:qrcodes,id
     * @bodyParam images array required between:1,5
     * @bodyParam images.* image required mimes:jpeg,jpg,png,gif max:5012
     * @bodyParam token Barier-token required
     * @response {
     * "success": true,
     *  "message": "Item created successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function store(Request $request)
    {
        $this->itemService->createItem($request);

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.item')]))->addStatusCode(201);

        return $this->response();
    }

    /**
     * Show Item
     * @urlParam item required int Item id. Example:1
     * @bodyParam token Barier-token required
     * @response {
     *  "data": {
     *     "id": 1,
     *    "title": "hiughiu",
     *   "details": "oihiojjjjjjjjjjjjjjhioj",
     *  "status": "found",
     * "owner": {
     *    "id": 2,
     *   "name": "User",
     *  "email": "user@nova.com",
     * "status": 1,
     * "mobile_number": "01142416124",
     *"receive_emails": false,
     *"receive_push_notifications": false,
     *"is_email_verified": false,
     *"is_mobile_number_verified": false,
     *"default_distance_unit": "kilo"
     *},
     *"subcategory": {
     *  "id": 5,
     * "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
     * "description": "Quia impedit hic nesciunt quis eum.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     *},
     *"model": {
     *   "id": 1,
     *  "name": "jhinoi",
     * "description": "pjipo",
     * "image": "http://wajad.test/images/default.png"
     * },
     *"color": {
     *   "id": 1,
     *  "name": "Red",
     * "icon": "images/colors/red.png"
     *},
     *"brand": {
     *   "id": 1,
     *  "name": "pojmop",
     * "description": "ijoi",
     * "image": "http://wajad.test/images/default.png"
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
     *"date": "2019-12-04 14:17:09",
     *"images": [
     *   {
     *      "id": 1,
     *     "image": "http://wajad.test/images/items/E9S8p3Z5R7GLR1qc1xBcECGZjHBALeDLU9KtvSCN.jpeg"
     * },
     * {
     *    "id": 2,
     *   "image": "http://wajad.test/images/items/EJgxxfyHErwzc3cPTGpCKmihIgcX8hNdYX4DirAo.jpeg"
     *},
     *{
     *   "id": 3,
     *  "image": "http://wajad.test/images/items/GxwJYCc5eSSUj585huRcVks8m17DUwCGhEUDNubN.jpeg"
     *},
     *{
     *   "id": 4,
     *  "image": "http://wajad.test/images/items/sp0KWN5ryd0VN6xzdIVbm9hY9dYemUlfDMD5LTmY.jpeg"
     *},
     *{
     *   "id": 5,
     *  "image": "http://wajad.test/images/items/1hancpYm0XR8HjjK4Iz8AVAUyMqkQPOubagobDxs.jpeg"
     *}
     *]
     *}
     *}
     * @return void
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }
    /**
     * Edit Item
     * @urlParam item required int Item id. Example: 1
     * @bodyParam title min:6,max:255 required
     * @bodyParam details min:20,max:500 required
     * @bodyParam color_id exists:colors,id required
     * @bodyParam brand_id exists:brands,id required
     * @bodyParam model_id exists:models,id required
     * @bodyParam sub_category_id exists:sub_category,id required
     * @bodyParam qrcode_id exists:qrcodes,id
     * @bodyParam images array required between:1,5
     * @bodyParam images.* image required mimes:jpeg,jpg,png,gif max:5012
     * @bodyParam token Barier-token required
     * @response {
     *  "success": true,
     * "message": "Item updated successfully.",
     *"status_code": 200
     *}
     * @return void
     */
    public function update(Request $request, Item $item)
    {
        $user = auth('api')->user();

        if (!$user->can('update', $item)) {
            throw new ApiException(trans('auth.not_authorized'), 400);
        }

        $this->itemService->updateItem($item, $request);

        $this->addResponse(trans('messages.updated', ['model' => trans('messages.attributes.item')]))->addStatusCode(200);

        return $this->response();
    }

    /**
     * Delete Item
     * @urlParam item required Item id. Example: 1
     * @bodyParam token Barier-token required
     * @response {
     *  "success": true,
     * "message": "Item deleted successfully.",
     *"status_code": 200
     *}
     * @return void
     */
    public function destroy(Item $item)
    {
        $user = auth('api')->user();

        if (!$user->can('destroy', $item)) {
            throw new ApiException(trans('auth.not_authorized'), 400);
        }

        if ($item->qrcode->type === 2){
            $item->qrcode->status = 2;
            $item->qrcode->item_id = null;
            $item->qrcode->save();
        }
        if ($item->qrcode->type === 1){
            $item->qrcode->status = 6;
            $item->qrcode->end_at = now();
            $item->qrcode->save();
        }

        $item->delete();

        $this->addResponse(trans('messages.deleted', ['model' => trans('messages.attributes.item')]))->addStatusCode(200);

        return  $this->response();
    }

    public function userItems()
    {
        return  ItemResource::collection(auth('api')->user()->items()->get());
    }
}
