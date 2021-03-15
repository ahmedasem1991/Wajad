<?php

namespace App\Http\Controllers\Api;

use App\Post;

use App\Qrcode;
use Carbon\Carbon;
use App\Mail\ScanQRCode;
use App\Events\SendFCMEvent;
use App\Events\SendSMSEvent;
use Illuminate\Http\Request;
use App\Services\SmsProvider;
use Spatie\QueryBuilder\Filter;
use App\Services\QrcodeLogService;
use http\Exception\BadUrlException;
use Illuminate\Support\Facades\Log;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Mail;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\QrcodeResource;
use App\Jobs\ScanQRCodeNotificationJob;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendFCMNotification;
use App\Notifications\ScanQRCodeNotification;

/**
 * @group QR Codes
 */
class SharePostController extends Controller
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
    public function __invoke(Request $request, Post $post)
    {
 
        if ($request->expectsJson())
        {
            return new PostResource($post);
        }else{
            return view('webview.post', compact('post')) ;
        }
 
    }

  
}
