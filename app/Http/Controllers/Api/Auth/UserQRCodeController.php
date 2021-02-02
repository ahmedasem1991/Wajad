<?php

namespace App\Http\Controllers\Api\Auth;

use App\Qrcode;
use App\Services\Filters\QRCodeFilters\AssignedToSpecificUser;
use App\Services\Filters\QRCodeFilters\RegisteredOrRerigstered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QrcodeResource;
use App\Services\Filters\QRCodeFilters\AssignedToUser;
use App\Services\Filters\QRCodeFilters\Expired;
use App\Services\Filters\QRCodeFilters\MultiAssign;
use App\Services\Filters\QRCodeFilters\Registered;
use App\Services\Filters\QRCodeFilters\SingleAssign;

/**
 * @group QR Codes
 */
class UserQRCodeController extends Controller
{
    /**
     * User QR Codes
     * @bodyParam token Barier-token required
     * @response
     *{"available":{
     * "single": [
     *  {
     *   "id": 1,
     *  "url": "http:\/\/api.wajad.test\/api\/scan-qr-code\/1",
     * "image":"",
     * "type":"Single Assign",
     * "status":"Assigned To User",
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
     *"multi": [],
     *"available_multi_count":1},
     *"active": [],
     *"active_count":1,
     *"expired": [],
     *"expired_count":1
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        $all = auth('api')->user()->qrcodes->where('status', '!=', 6)->where('end_at', '<', now());
        if($all->count() > 0){
            foreach ($all as $item){
                $item->update(['status' => 6]);
            }
        }
        $available_single_qr_code = auth('api')->user()->qrcodes()->withFilters(
            new SingleAssign , new AssignedToUser
        )->paginate(20, ['*'], 'available_single_page');
//              );


        $available_multi_qr_code = auth('api')->user()->qrcodes()->withFilters(
            new MultiAssign , new AssignedToUser
        )->paginate(20, ['*'], 'available_multi_page');
//    );
        $registered_qr_code = auth('api')->user()->qrcodes()->withFilters(
            new RegisteredOrRerigstered
        )->paginate(20, ['*'], 'active_page');
//    );
        $expired_qe_code = auth('api')->user()->qrcodes()->withFilters(
            new Expired
        )->paginate(20, ['*'], 'expired_page');
//    );
        $availableQrCodes = collect([
//            'single' => QrcodeResource::collection($available_single_qr_code->get()),
//            'available_single_count' => $available_single_qr_code->count(),
//            'multi' => QrcodeResource::collection($available_multi_qr_code->get()),
//            'available_multi_count' => $available_multi_qr_code->count()

             'count_all' => $available_single_qr_code->total() + $available_multi_qr_code->total(),
             'single' => QrcodeResource::collection($available_single_qr_code),
             'available_single_per_page' => $available_single_qr_code->perPage(),
             'available_single_current_page' => $available_single_qr_code->currentPage(),
             'available_single_total_pages' => $available_single_qr_code->lastPage(),
             'available_single_count' => $available_single_qr_code->total(),
             'multi' => QrcodeResource::collection($available_multi_qr_code),
             'available_multi_count' => $available_multi_qr_code->total(),
             'available_multi_per_page' => $available_multi_qr_code->perPage(),
             'available_multi_current_page' => $available_multi_qr_code->currentPage(),
             'available_multi_total_pages' => $available_multi_qr_code->lastPage()
        ]);

        return collect([
            'available' => $availableQrCodes,
//            'active' => QrcodeResource::collection($registered_qr_code->get()),
//            'active_count' => $registered_qr_code->count(),
//            'expired' => QrcodeResource::collection($expired_qe_code->get()),
//            'expired_count' => $expired_qe_code->count()

             'active' => QrcodeResource::collection($registered_qr_code),
             'active_count' => $registered_qr_code->total(),
             'active_per_page' => $registered_qr_code->perPage(),
             'active_current_page' => $registered_qr_code->currentPage(),
             'active_total_pages' => $registered_qr_code->lastPage(),
             'expired' => QrcodeResource::collection($expired_qe_code),
             'expired_count' => $expired_qe_code->total(),
             'expired_per_page' => $expired_qe_code->perPage(),
             'expired_current_page' => $expired_qe_code->currentPage(),
             'expired_total_pages' => $expired_qe_code->lastPage()
        ]);
    }
}
