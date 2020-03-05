<?php

namespace App\Services;

use App\Item;
use App\Qrcode;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;
use App\Exceptions\Api\ApiException;
use App\Services\Filters\QRCodeFilters\AssignedToSpecificUser;
use App\Services\Filters\QRCodeFilters\AssignedToUser;
use Illuminate\Support\Facades\Validator;

class ItemService
{
    protected function createItem($request)
    {
        $this->validateItemRequest($request);

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
            $qr_code = Qrcode::find($request->qrcode_id)
                ->withFilters(
                    new AssignedToSpecificUser,
                    new AssignedToUser
                )->first();

            if (!$qr_code) {
                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 400);
            }

            if ($qr_code->type == 1 && $qr_code->status == 4) {
                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 400);
            }

            $qr_code::where('id', $request->qrcode_id)->update([
                'item_id' => $item->id,
                'status' => 4,
                'start_at' => Carbon::now()->toDateTimeString(),
                'end_at' => Carbon::now()->addDays($qr_code->available_period)
            ]);
        }


        if ($request->has('images') && count($request->images) > 0) {
            $item_images = [];
            foreach ($request->images as $image) {
                if (preg_match("/^data:image/", $image)) {
                    $image_name = Str::random(15) . '.' . 'png';
                    $path = public_path('/images//' . $image_name);
                    Image::make(file_get_contents($image))->save($path);
                    array_push($item_images, '/images//' . $image_name);
                }
                if (!preg_match("/^data:image/", $image)) {
                    array_push($item_images, $image);
                }
            }
            $item->fill([
                'images' => $item_images
            ]);
        }
        $item->save();
    }

    protected function updateItem()
    {
    }

    private function validateItemRequest($request)
    {
        $validate_request = Validator::make($request->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'details' => ['required', 'min:20', 'max:500'],
            'color_id' => ['required', 'exists:colors,id'],
            'model_id' => ['required', 'exists:models,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'qrcode_id' => ['nullable', 'exists:qrcodes,id'],
            'images' => ['sometimes', 'array', 'between:0,5'],
            'image.*' => ['sometimes', 'base64dimensions:min_width=100,min_height=200'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }
    }
}
