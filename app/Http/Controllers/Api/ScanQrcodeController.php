<?php

namespace App\Http\Controllers\Api;

use App\Qrcode;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use Illuminate\Support\Facades\Log;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\QrcodeResource;
use App\Jobs\ScanQRCodeNotificationJob;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ScanQRCodeNotification;

/**
 * @group QR Codes
 */
class ScanQrcodeController extends Controller
{
    /**
     * Scan QR Code
     * @urlParam qrcode_url required string exists in qrcodes
     * @bodyParam token Barier-token required
     * @response 
     *{
     * "data": {
     *  "id": 1,
     * "url": "http:\/\/api.wajad.test\/api\/scan-qr-code\/1",
     *"user": {
     * "id": 2,
     * "name": "User",
     * "email": "user@nova.com",
     * "status": 1,
     * "mobile_number": "0096601120650906",
     * "receive_emails": false,
     * "receive_push_notifications": false,
     * "is_email_verified": false,
     * "is_mobile_number_verified": false,
     * "default_distance_unit": "kilo",
     * "image": "http:\/\/wajad.test\/images\/profile\/default-profile.png"
     * },
     * "item": null,
     * "available_period": "1",
     * "start_at": null,
     * "end_at": null,
     * "created_at": null
     *}
     *} 
     * @return void
     */
    public function __invoke(Request $request, Qrcode $qr_code)
    {
        if (Carbon::now()->toDateTimeString() < $qr_code->end_at) {
            throw new ApiException(trans('messages.expired', ['model' => trans('messages.attributes.qrcode')]), 400);
        }
        ScanQRCodeNotificationJob::dispatch($request, $qr_code);
       // logger('qrcode scaned successfully .... ' . $qr_code->user->email);
        return new QrcodeResource($qr_code);
    }

    public function registerQrcodes(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'qrcode_id' => ['required', 'exists:qrcodes,id'],
            'item_id' => ['required', 'exists:items,id'],

        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }
        return (new Qrcode)->registerQrcode($request);
    }
}
