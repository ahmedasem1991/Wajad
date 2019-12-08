<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Qrcode;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;

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
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }
        $item = Item::create([
            'title' =>  $request->title,
            'details' =>  $request->details,
            'owner_id' =>  $request->owner_id,
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
        if ($request->has('images')) {
            array_map(function ($image) use ($item) {
                $item->images()->create([
                    'image' =>  $image->store('images/items')
                ]);
            }, $request->images);
        }

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.item')]))->addStatusCode(201);

        return $this->response();
    }

    /**
     * Show Item
     * @urlParam item required int Item id. Example:1 
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
                'images' => ['sometimes', 'array', 'between:1,5'],
                'images.*' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:5012'],
            ]);

            if ($validate_request->fails()) {
                throw new ApiException($validate_request->errors()->first(), 400);
            }

            $item->update($request->all());

            if ($request->has('images')) {
                array_map(function ($image) use ($item, $request) {
                    $item->images()->create([
                        'image' =>  $request->file($image)->store('images/items')
                    ]);
                }, $request->images);
            }

            $this->addResponse(trans('messages.updated', ['model' => trans('messages.attributes.item')]))->addStatusCode(200);

            return $this->response();
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
    }

    /**
     * Delete Item
     * @urlParam item required Item id. Example: 1
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
