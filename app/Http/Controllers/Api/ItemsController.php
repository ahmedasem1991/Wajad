<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Qrcode;
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
            throw new ApiException($validate_request->errors(), 400);
        }
        $item = Item::create([
            'title' =>  $request->title,
            'details' =>  $request->details,
            'owner_id' =>  $request->owner_id,
            'category_id' =>  $request->category_id,
            'model_id' =>  $request->model_id,
            'brand_id' =>  $request->brand_id,
            'color_id' =>  $request->color_id,
        ]);
        if ($request->has('qrcode_id')) {
            $qr_code = Qrcode::find($request->qrcode_id);
            $qr_code::update([
                'item_id' => $item->id
            ]);
        }
        if ($request->has('images')) {
            array_map(function ($image) use ($item, $request) {
                $item->images()->create([
                    'image' =>  $image->store('images/items')
                ]);
            }, $request->images);
        }

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.item')]))->addStatusCode(201);

        return $this->response();
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
