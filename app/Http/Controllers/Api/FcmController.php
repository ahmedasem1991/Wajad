<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\FcmUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\FcmResource;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;
 

/**
 * @group FCM
 */
class FcmController extends Controller
{
 
        /**
         * Get FCM List
         * @bodyParam token Barier-token required
         * @response {
        *    "id": "6b328e8f-b787-4c9b-a09c-8933bbd370dd",
        *    "data": [
        *        {
        *            "ar": {
        *                "title": "  هناك شخص  قرأ رمز التعريف  الخاص بك ",
        *               "body": "هناك شخص  قرأ رمز التعريف  الخاص بك   يمكنك اللإطلاع علي الخريطة . "
        *           },
        *           "en": {
        *               "title": "  There Some One Scanned Your QR Code ",
        *              "body": "There Some One Scanned Your QR Code    Check the location on the map . "
        *          },
        *           "url": "https://www.google.com/maps/search/?api=1&query=30.254445588,40.3644552",
        *           "type": "qrcode",
        *          "object_type": "scan",
        *           "id": 10295,
        *           "related_id": -1,
        *          "badge": 1
        *      }
        *    ],
        *     "created_at": "2020-04-07T15:07:22.000000Z",
        *    "read_at": "2020-04-07T15:07:22.000000Z"
        * }
    
     * @return void
     */
    public function index(Request $request)
    {
        return FcmResource::collection(auth('api')->user()->notifications()->get());
    }
 
    /**
     * Save Fcm  Device Token
     * @bodyParam fcm_token required
     * @bodyParam lang required in:ar,en
     * @bodyParam device required in:android,ios 
     * @bodyParam token Barier-token required
     * @response {
     * "success": true,
     *  "message": "FCM Token created successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function store(Request $request)
    {
        $validate_request = Validator::make($request->all(), [
                'fcm_token'  => 'required',
                'lang'  => 'required|in:ar,en',
                'device'  => 'required|in:android,ios',
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if(FcmUser::whereToken($request->input('fcm_token'))->count() > 0)
            $fcm = FcmUser::whereToken($request->input('fcm_token'))->first();
        else
            $fcm = new FcmUser;
        
        $fcm->user_id = auth('api')->user()->id; 
        $fcm->device  = $request->input('device'); 
        $fcm->lang    = $request->input('lang'); 
        $fcm->token   = $request->input('fcm_token'); 
        $fcm->save();

        $this->addResponse('FCM Token added successfully')->addStatusCode(201);

        return $this->response();
    }



    /**
     * Delete FCM
     * @urlParam fcm_token required 
     * @bodyParam token Barier-token required
     * @response {
     *  "success": true,
     * "message": "Fcm  Token  deleted successfully.",
     *"status_code": 200
     *}
     * @return void
     */
    public function delete(Request $request)
    {
        $user = auth('api')->user();
        $validator = Validator::make( $request->all(), [
            'fcm_token'  => 'required'
        ]);
        if ($validator->fails()) {
            throw new ApiException($validator->errors()->first(), 400);
        }
        if($user->devices->contains('token', $request->input('fcm_token')))
            FcmUser::whereToken($request->input('fcm_token'))->delete();


        $this->addResponse('Fcm Device Token deleted successfully')->addStatusCode(200);

        return  $this->response();
    }


      /**
     * Gel All FCM List
     * @urlParam fcm_token required 
     * @bodyParam token Barier-token required
     * @response {
     *  "success": true,
     * "message": "Fcm  Token  deleted successfully.",
     *"status_code": 200
     *}
     * @return void
     */
    public function getFcmList(Request $request)
    {
        $user = auth('api')->user();
        $validator = Validator::make( $request->all(), [
            'fcm_token'  => 'required'
        ]);
        if ($validator->fails()) {
            throw new ApiException($validator->errors()->first(), 400);
        }
        if($user->devices->contains('token', $request->input('fcm_token')))
            FcmUser::whereToken($request->input('fcm_token'))->delete();


        $this->addResponse('Fcm Device Token deleted successfully')->addStatusCode(200);

        return  $this->response();
    }

}
