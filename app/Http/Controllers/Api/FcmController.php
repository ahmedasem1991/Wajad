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
use Illuminate\Support\Facades\DB;



/**
 * @group FCM
 */
class FcmController extends Controller
{

        /**
         * Get FCM List
         * @bodyParam token Barier-token required
         * @response
         *
         * {
         * "unread_count": 3,
         *  "data": [
       * {
         *   "id": "35b355cb-0c30-46ed-b56c-e1217f71af0a",
         *   "payload": {
           *     "title": "  The Item Shawmii",
            *    "body": "Your Item  Shawmii Shawmiii x + jemii added successfully . ",
            *    "type": "item",
            *    "deeplink": "item",
            *    "image": null,
            *    "item": {
          * "owner":{
          *  "image":"http:\/\/wajad.test\/images\/profile\/default-profile.png",
          *  "country":{
           *    "country_code":"93",
           *    "updated_at":null,
           *    "name_ar":"أفغانستان",
           *    "created_at":null,
           *    "id":1,
           *    "iso_code":"AF",
           *    "deleted_at":null,
           *    "name_en":"Afghanistan"
           * },
          *  "is_email_verified":false,
           * "name":"User",
           * "receive_emails":false,
           * "id":2,
           * "default_distance_unit":"kilo",
           * "mobile_number":"1142416124",
           * "receive_push_notifications":false,
           * "email":"ibrahim.saber512@outlook.com",
           * "status":1,
           * "is_mobile_number_verified":false
        * },
        * "date":"2020-01-13 14:50:51",
        * "images":[
        * ],
        * "color":{
        *    "name":"Silver",
         *   "icon":"images\/profile\/default-profile.png",
         *   "id":9
        * },
        * "qrcode":null,
        * "title":"Shawmii",
        * "deleted_at":"",
        * "details":"Shawmiii x + jemii",
        * "model":{
          *  "image":"http:\/\/wajad.test\/images\/posts\/post3.jpg",
          *  "name":"Dell XPS 13",
          *  "description":"CPU: 8th generation Intel Core i5 \u2013 i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB \u2013 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) \u2013 4k (3840 x 2160) | Storage: 256GB \u2013 1TB SSD",
         *   "id":1
        * },
        * "id":1,
        * "subcategory":{
         *   "image":"http:\/\/wajad.test\/images\/default.png",
          *  "name":"Lap top",
          *  "description":null,
         *   "id":12
     *    },
      *   "brand":{
      *      "image":"http:\/\/wajad.test\/images\/posts\/post7.jpg",
      *      "name":"LCWIKIKI",
      *      "description":"",
      *      "id":1
     *    },
     *    "status":"found"
     * },
      * "post" :null,
             *   "url": null,
              *  "id": 1,
             *   "badge": 31
           * },
          *  "created_at": "2020-04-15T17:33:22.000000Z",
          *  "read_at": "2020-04-15T17:33:22.000000Z"
       * }
      *  ]
        * }

     * @return void
     */
    public function index(Request $request)
    {
        $notifications = auth('api')->user()->notifications()->paginate(25);

        $array['unread_count']=auth('api')->user()->notifications()->where('read_at',null)->count();

        $array['per_page'] = $notifications->perPage();
        $array['current_page'] = $notifications->currentPage();
        $array['total_pages'] = $notifications->lastPage();
        $array['data']=FcmResource::collection($notifications);

//        $array['data']=FcmResource::collection(auth('api')->user()->notifications()->get());
        return $array;
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


        /**
     * Save Read  Time
     * @bodyParam notification_id required
     * @bodyParam token Barier-token required
     * @response {
     * "success": true,
     *  "message": "Notification  Updated successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function readfcm(Request $request)
    {
        $validate_request = Validator::make($request->all(), [
                'notification_id'  => 'required',
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $notification=DB::table('notifications')->find($request->notification_id);
        if($notification)
        {
          DB::table('notifications')->where('id',$request->notification_id)->update(['read_at' => \Carbon\Carbon::now()]);
          $this->addResponse('Notification  Updated successfully')->addStatusCode(200);
          return $this->response();
        }
        else{
        $this->addResponse('Notification  Not Found')->addStatusCode(201);
        return $this->response();
        }



    }




}
