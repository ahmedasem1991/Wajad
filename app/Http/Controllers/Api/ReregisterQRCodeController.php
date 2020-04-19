<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Qrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendFCMNotification;

/**
 * @group QR Codes
 */
class ReregisterQRCodeController extends Controller
{
    /**
     * Reregister QR Code
     * @urlParam qrcode_id required int exists in qrcodes
     * @urlParam item_id required int exists in items
     * @bodyParam token Barier-token required
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
            'qrcode_id' => ['required', 'integer',  'exists:qrcodes,id'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $item = Item::where('id', $request->item_id)->Where('owner_id', auth('api')->user()->id)->first();

        if (!$item) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.item')]), 400);
        }

        $qr_code = Qrcode::find( $request->qrcode_id)
            ->Where('user_id', auth('api')->user()->id)
            ->WhereNotNull('item_id')
            // ->Where('status', 4)
            // ->orWhere('status', 5)
            ->Where('type', 2)
            ->first();
            //dd($qr_code);

        if (!$qr_code) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 400);
        }

        if ($qr_code->isQrcodeExpired()) {
            $qr_code->updateQrcodeToexpired();
            throw new ApiException(trans('messages.expired', ['model' => trans('messages.attributes.qrcode')]), 400);
        }

        $qr_code->reassignQrcodeToItem($request->item_id);

        $this->addResponse(trans('messages.registered', ['model' => trans('messages.attributes.qrcode')]))->addStatusCode(201);

           // Send FCM
           $badge =getBadge(auth('api')->user());
           $data=sendAssignQRCodeFCM($item,$badge);
           auth('api')->user()->notify(new SendFCMNotification( auth('api')->user(),$data));
        return $this->response();
    }
}
