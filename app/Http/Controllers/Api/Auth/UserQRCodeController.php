<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QrcodeResource;

/**
 * @group QR Codes
 */
class UserQRCodeController extends Controller
{
    /**
     * User QR Codes
     * @response 
     *{
     * "single": [
     *  {
     *   "id": 1,
     *  "url": "http:\/\/api.wajad.test\/api\/scan-qr-code\/1",
     * "user": {
     *  "id": 2,
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
     *},
     *"item": null
     *}
     *],
     *"multi": [],
     *"active": [],
     *"expired": []
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        $qrcodes = collect([
            'single' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->singleAssign()->inStock()->get()
            ),
            'multi' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->multiAssign()->status(1)->get()
            ),
            'active' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->registered()->get()
            ),
            'expired' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->registered()->get()
            )
        ]);

        return $qrcodes;
    }
}
