<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Qrcode;
use App\Package;
use Carbon\Carbon;
use App\AssignQrcode;
use Laravel\Nova\Nova;
use App\GenerateQrcode;
use App\Events\SendFCMEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Jobs\GenerateAndAssigneQrcodeJob;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendFCMNotification;
use App\Notifications\BroadcastNotification;
use App\Subscription;

/**
 * @group QR Codes
 */
class GenerateAndAssignQRCodeController extends Controller
{
    /**
     * Generate & Assign QRcodes (after payment)
     * @bodyParam package_id int required exists in packages
     * @bodyParam count int min:1
     * @bodyParam token Barier-token required
     * @response
     * {
     * "success": true,
     *"message": "qrcode created successfully.",
     *"status_code": 200,
     * "data": [
     *  "http://admin.wajad.test/images/qrcodes/1582038260RUIWysWSgVQdk9wRiw0p.png",
     *  "http://admin.wajad.test/images/qrcodes/15820382600Mew2xPd332r1BoV7sIn.png",
     *  "http://admin.wajad.test/images/qrcodes/1582038260bpxW4CDRAAZ0C1jtJApP.png"
     * ]
     *}
     * @return void
     */
    public function store(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'package_id' => ['required', 'exists:packages,id'],
            'count' => ['sometimes', 'int', 'min:1'],
        ]);

        if ($validate_request->fails()) {
            $this->addResponse($validate_request->errors()->first())->addStatusCode(400);
            return $this->response();
        }

        $package = Package::find($request->package_id);


        $dispatcher = Subscription::getEventDispatcher();
        Subscription::unsetEventDispatcher();
        $package->subscription([
            'corporate_id' => Null,
            'user_id' => auth('api')->user()->id,
            'subscriber' => 1,
            'created_from' => 'mobile'
        ]);
        Subscription::setEventDispatcher($dispatcher);




        $now = Carbon::now();

        $middle = $now->year . $now->month . $now->day . '-' . $now->hour . $now->minute;
        // $generate_reference_number = NULL;
        $assign_reference_number = 'C-' . $middle . $now->second;

        $qrcode_images = [];

        $dispatcher = AssignQrcode::getEventDispatcher();
        AssignQrcode::unsetEventDispatcher();
        AssignQrcode::create([
            'assign_reference_number' => $assign_reference_number,
            'assign_to' => 1,
            'user_id' => auth('api')->user()->id,
            'corporate_id' => NULL,
            'type' => $package->type,
            'available_period' => str_replace(" Day/s", "", $package->period),
            'quantity' => $package->quantity,
            'created_from' => 'mobile',
        ]);

        AssignQrcode::setEventDispatcher($dispatcher);
        $QRCodes = Qrcode::status('In Stock')->where('type', $package->type)->take($package->quantity)->get();


        foreach ($QRCodes as $QRCode) {
            array_push($qrcode_images, env('ADMIN_URL') . '/' . $QRCode->image);


            $QRCode->assign_reference_number = $assign_reference_number;
            $QRCode->status = 2;
            $QRCode->available_period = str_replace(" Day/s", "", $package->period);
            $QRCode->user_id = auth('api')->user()->id;
            $QRCode->corporate_id = NULL;
            $QRCode->save();
        }


        // Send FCM
        $badge = getBadge(auth('api')->user());
        $data = sendBuyPackageFCM($package, $badge);
        auth('api')->user()->notify(new SendFCMNotification(auth('api')->user(), $data));


        //Send SMS

        //   $message=sendBuyPackageSMS($package, auth('api')->user());
        //   \Unifonic::send(auth('api')->user()->country->country_code. auth('api')->user()->mobile_number, $message);




        $url = Nova::path() . '/resources/stocks';
        $Admins = User::superAdmin()->get();
        $usr_fcm_message = '"' . $package->quantity . '" QR Code Assigned Successfully To You.';
        $message = '"' . $package->quantity . '" QR Code Assigned Successfully To ' . User::find(auth('api')->user()->id)->name . ' from mobile ( ' . $package->name_en . ' )';

        foreach ($Admins as $user) {
            $user->notify(new BroadcastNotification('info', $message, $url));
        }



        return ([
            'success' => true,
            'message' => trans(
                'messages.created',
                ['model' => trans('messages.attributes.qrcode')]
            ),
            'status_code' => 200,
            'data' => $qrcode_images
        ]);
        // $this->addResponse(
        //     trans('messages.created',
        //     ['model' => trans('messages.attributes.qrcode')]))
        //     ->addStatusCode(201);

        // Log::INFO($this->response());
        // return $this->response();


    }
}
