<?php

namespace App\Http\Controllers\Api;

use App\Item;
use Exception;
use App\Qrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
 * @group QR Codes
 */
class RegisterQRCodeController extends Controller
{
    /**
     * Register QR Code
     * @urlParam qrcode_id required int exists in qrcodes
     * @urlParam item_id required int exists in items    
     * @response 
     * {
     * "success": true,
     * "message": "qrcode registered successfully.",
     * "status_code": 200
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'item_id' => ['required', 'integer', 'exists:items,id'],
            'qrcode_id' => ['required', 'integer', 'exists:qrcodes,id'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $item = Item::where('id', $request->item_id)->Where('owner_id', auth('api')->user()->id)->first();
  
        if (!$item) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.item')]), 404);
        }

        $qr_code = Qrcode::where('id', $request->qrcode_id)
            ->Where('user_id', auth('api')->user()->id)
            ->Where('item_id', null)
            ->Where('status', 2)
            ->first();

        if (!$qr_code) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 404);
        }

        $qr_code->assignQrcodeToItem($request->item_id);

        $this->addResponse(trans('messages.registered', ['model' => trans('messages.attributes.qrcode')]))->addStatusCode(201);

        return $this->response();
    }
}
