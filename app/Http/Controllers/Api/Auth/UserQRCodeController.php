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
     * @bodyParam token Barier-token required
     * @response 
     *{
     * "available_single": [
     *  {
     *   "id": 1,
     *  "url": "http:\/\/api.wajad.test\/api\/scan-qr-code\/1",
     *  "unique_reference_number":"QR-2020115-16814-wlB2C",
     *  "generate_reference_number": "N-2020115-16812",
     *  "assign_reference_number":"C-202023-161247",
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
     *"item": null,
     *"available_period":12,
     *"start_at":null,
     *"end_at":null,
     *"created_at":null
     *}
     *],
     *"available_single_count":1,
     *"available_multi": [],
     *"available_multi_count":1,     
     *"active": [],
     *"available_active":1,
     *"expired": [],
     *"available_expired":1
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        $qrcodes = collect([
            'available_single' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->singleAssign()->get()
            ),
            'available_single_count' => count(
                QrcodeResource::collection(
                    auth('api')->user()->qrcodes()->singleAssign()->get()
                )
            ),
            'available_multi' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->multiAssign()->get()
            ),
            'available_multi_count' => count(
                QrcodeResource::collection(
                    auth('api')->user()->qrcodes()->multiAssign()->get()
                )
            ),
            'active' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->registered()->get()
            ),
            'active_count' => count(
                QrcodeResource::collection(
                    auth('api')->user()->qrcodes()->registered()->get()
                )
            ),
            'expired' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->expired()->get()
            ),
            'expired_count' => count(
                QrcodeResource::collection(
                    auth('api')->user()->qrcodes()->expired()->get()
                )
            )
        ]);

        return $qrcodes;
    }
}
