<?php

namespace App\Services;

use App\Item;
use App\Qrcode;
use Illuminate\Support\Str;
use App\Exceptions\Api\ApiException;
use Illuminate\Support\Facades\Validator;
use App\Services\Filters\QRCodeFilters\FindWhere;
use App\Services\Checkers\QrCodeCheckers\IsExpired;
use App\Services\Filters\QRCodeFilters\FindWhereId;
use Intervention\Image\ImageManagerStatic as Image;
use App\Services\Filters\QRCodeFilters\AssignedToUser;
use App\Services\Checkers\QrCodeCheckers\IsSingleAssign;
use App\Services\Filters\QRCodeFilters\AssignedToSpecificUser;

class ItemService
{
    public function createItem($request)
    {
        $this->validateItemRequest($request);

        $request->merge([
            'owner_id' => auth('api')->user()->id,
        ]);

        $item = Item::create(
            $request->only([
                'title',
                'details',
                'category_id',
                'model_id',
                'brand_id',
                'color_id',
                'sub_category_id',
                'owner_id'
            ])
        );

        if ($request->has('qrcode_id') && $request->qrcode_id !== '' && $request->qrcode_id != null) {

            $qr_code = Qrcode::withFilters(
                new FindWhereId($request->qrcode_id),
                new AssignedToSpecificUser,
                new AssignedToUser
            )->first();

            if (!$qr_code) {
                throw new ApiException(
                    trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]),
                    400
                );
            }

            if ($qr_code->checkFor(
                new IsSingleAssign,
                new IsExpired
            )) {
                throw new ApiException(
                    trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]),
                    400
                );
            }

            $qr_code->assignQrcodeToItem($item->id);
        }

        if ($request->has('images') && count($request->images) > 0) {
            $item->fill([
                'images' => $this->uploadImages($request->images)
            ]);
        }

        $item->save();
    }

    public function updateItem(Item $item, $request)
    {
        $this->validateItemRequest($request);

        $item->update($request->only([
            'title',
            'details',
            'category_id',
            'model_id',
            'brand_id',
            'color_id',
            'sub_category_id',
        ]));

        if ($request->has('qrcode_id') && $request->qrcode_id !== '' && $request->qrcode_id != null) {
            $qr_code = Qrcode::withFilters(
                new FindWhereId($request->qrcode_id),
                new AssignedToSpecificUser,
                new AssignedToUser
            )->first();

            if (!$qr_code) {
                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 400);
            }

            $qr_code->assignQrcodeToItem($item->id);
        }

        if ($request->has('images') && count($request->images) > 0) {

            $item->fill([
                'images' => $this->uploadImages($request->images)
            ]);

            $item->save();
        }
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

    private function uploadImages($images)
    {
        $item_images = [];
        foreach ($images as $image) {
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
        return $item_images;
    }
}
