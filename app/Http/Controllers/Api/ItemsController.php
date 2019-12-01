<?php

namespace App\Http\Controllers\Api;

use App\Item;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    public function index()
    {
        return ItemResource::collection(Item::all());
    }

    public function store(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'details' => ['required', 'min:20', 'max:500'],
            'owner_id' => ['required', 'exists:users,id'],
            'color_id' => ['required', 'exists:colors,id'],
            'model_id' => ['required', 'exists:models,id'],
            'brand_id' => ['required', 'exists:brands,id'],

        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }
        return (new Item)->createItem($request);
    }

    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Item $item)
    {
        $item = Item::find($id);
        if (empty($item)) {
            $this->addResponse(trans('posts.not_found'))->addStatusCode(200);
            return  $this->response();
        }
        $item->delete();
        $this->addResponse(trans('posts.successfully_deleted'))->addStatusCode(200);
        return  $this->response();
    }
    public function userItems()
    {
        return  ItemResource::collection(auth('api')->user()->items()->get());
    }
}
