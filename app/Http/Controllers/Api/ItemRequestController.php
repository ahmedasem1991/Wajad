<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\ItemRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @group Item Request
 */
class ItemRequestController extends Controller
{
    /**
     * Create Item Request
     * @urlParam item_id required int, exists in items
     * @response {
     * "success": true,
     *  "message": "Item request created successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function  __invoke(Request $request, Item $item)
    {
        $item = ItemRequest::create([
            'item_id' => $item->id,
            'user_id' => auth('api')->user()->id,
        ]);

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.item_request')]))->addStatusCode(201);

        return $this->response();
    }
}
