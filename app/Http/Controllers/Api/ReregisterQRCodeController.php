<?php

namespace App\Http\Controllers\Api;

use App\Qrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
 * @group QR Codes
 */
class ReregisterQRCodeController extends Controller
{
    /**
     * Reregister QR Code
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
            'item_id' => ['required', 'exists:items,id'],
            'qrcode_id' => ['required', 'exists:qrcodes,id'],
        ]);

        if ($validate_request->fails()) {
            $this->addResponse($validate_request->errors()->first())->addStatusCode(400);
            return $this->response();
        }

        $QRCode = Qrcode::find($request->qrcode_id);

        if ($QRCode->type != 2 && $QRCode->status != 4) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 404);
        }

        if (Carbon::now()->toDateTimeString() > $QRCode->end_at) {
            $QRCode->update([
                'status' => 6
            ]);
            throw new ApiException(trans('messages.expired', ['model' => trans('messages.attributes.qrcode')]), 400);
        }

        $QRCode->update([
            'item_id' => $request->item_id,
            'status' => 5,
        ]);
        $this->addResponse(trans('messages.registered'), ['model' => trans('messages.attributes.qrcode')])->addStatusCode(201);
        return $this->response();
    }
}
