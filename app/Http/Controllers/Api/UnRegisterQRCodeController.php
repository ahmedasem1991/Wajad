<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Qrcode;
use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendFCMNotification;

/**
 * @group QR Codes
 */
class UnRegisterQRCodeController extends Controller
{
    /**
     * UnRegister QR Code
     * @urlParam qrcode_id required int exists in qrcodes
     * @response
     * {
     * "success": true,
     * "message": "qrcode Unregistered successfully.",
     * "status_code": 200
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'qrcode_id' => ['required', 'integer', 'exists:qrcodes,id'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $qr_code = Qrcode::where('id', $request->qrcode_id)
            ->first();

        if (!$qr_code) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 400);
        }

        if ( $qr_code->isQrcodeExpired()){
            throw new ApiException(trans('messages.expired', ['model' => trans('messages.attributes.qrcode')]), 400);
        }

        if ($qr_code->type !== 2 ){
            throw new ApiException(trans('messages.single_assign', ['model' => trans('messages.attributes.qrcode')]), 400);
        }

        $qr_code->status = 2;
        $qr_code->item_id = null;
        $qr_code->save();

        $this->addResponse(trans('messages.unregistered', ['model' => trans('messages.attributes.qrcode')]))->addStatusCode(201);

        return $this->response();
    }
}
