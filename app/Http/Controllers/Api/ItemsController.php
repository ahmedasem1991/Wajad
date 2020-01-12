<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Qrcode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $validate_request = Validator::make($request->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'details' => ['required', 'min:20', 'max:500'],
            'color_id' => ['required', 'exists:colors,id'],
            'model_id' => ['required', 'exists:models,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'images' => ['sometimes', 'array', 'between:0,5'],
            'image.*' => ['sometimes', 'base64dimensions:min_width=100,min_height=200'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }
        $item = Item::create([
            'title' =>  $request->title,
            'details' =>  $request->details,
            'category_id' =>  $request->category_id,
            'model_id' =>  $request->model_id,
            'brand_id' =>  $request->brand_id,
            'color_id' =>  $request->color_id,
            'sub_category_id' => $request->sub_category_id,
            'owner_id' => auth('api')->user()->id,
        ]);
        if ($request->has('qrcode_id')) {
            $qr_code = Qrcode::find($request->qrcode_id);
            $qr_code::update([
                'item_id' => $item->id
            ]);
        }
        if ($request->has('images') && count($request->images) > 0) {
            $item_images = [];

            array_map(function ($image) use ($item_images) {
                $image_name = Str::random(15) . '.' . 'png';
                $path = public_path('/images//' . $image_name);
                Image::make(file_get_contents($image))->save($path);
                array_push($item_images, '/images//' . $image_name);
            }, $request->images);

            $item->fill([
                'images' => $item_images
            ]);

            $item->save();
        }

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
        if ($user->can('update', $item)) {
            $validate_request = Validator::make($request->all(), [
                'title' => ['required', 'min:6', 'max:255'],
                'details' => ['required', 'min:9', 'max:500'],
                'sub_category_id' => ['required', 'exists:sub_categories,id'],
                'brand_id' => ['required', 'exists:brands,id'],
                'model_id' => ['required', 'exists:models,id'],
                'color_id' => ['required', 'exists:colors,id'],
                'images' => ['sometimes', 'array', 'between:0,5'],
                'image.*' => ['sometimes', 'base64dimensions:min_width=100,min_height=200'],
            ]);

            if ($validate_request->fails()) {
                throw new ApiException($validate_request->errors()->first(), 400);
            }

            $item->update($request->all());

            if ($request->has('images') && count($request->images) > 0) {
                $item_images = [];

                array_map(function ($image) use ($item_images) {
                    $image_name = Str::random(15) . '.' . 'png';
                    $path = public_path('/images//' . $image_name);
                    Image::make(file_get_contents($image))->save($path);
                    array_push($item_images, '/images//' . $image_name);
                }, $request->images);

                $item->update([
                    'images' => $item_images
                ]);
            }

            $this->addResponse(trans('messages.updated', ['model' => trans('messages.attributes.item')]))->addStatusCode(200);

            return $this->response();
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
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
        if ($user->can('destroy', $item)) {
            $item->delete();
            $this->addResponse(trans('messages.deleted', ['model' => trans('messages.attributes.item')]))->addStatusCode(200);
            return  $this->response();
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
    }
    public function userItems()
    {
        return  ItemResource::collection(auth('api')->user()->items()->get());
    }
}
