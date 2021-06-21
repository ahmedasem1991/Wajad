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
class QrcodeController extends Controller
{




    /**
     * Renew QR Code
     * @bodyParam qrcode_id string required exists in qrcodes,url
     * @bodyParam days integer required
     * @response
     * {
     * "success": true,
     * "message": "QR Code Renew Successfully",
     * "status_code": 200
     *}
     * @return object
     */
    public function renew(Request $request)
    {
        $validate_request = Validator::make($request->all(), [
            'qrcode_id' => ['required'],
            'days' => ['required'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }
    //    $check_qrcode= Qrcode::where('name', $request->input('name'))
    //    ->where('user_id', auth('api')->user()->id)
    //    ->where('qrcode_url','!=',$request->input('qrcode_url'))
    //    ->first();
      
    //    if($check_qrcode)
    //    throw new ApiException('You have QR Code with same name', 400);
       

        $qrcode = Qrcode::where('id', $request->input('qrcode_id'))->first();

        if (is_null($qrcode) ){
            throw new ApiException('QR Code Not Found', 400);
        }


        if( $qrcode->item)
        {
            if($qrcode->isQrcodeSingleAssign && $qrcode->item->deleted_at != NULL )
            {
                throw new ApiException('Can not renew this QR Code', 400);
            }

        }
       
    

        $qrcode->end_at =  Carbon::now()->addDays($request->input('days'));
        $qrcode->status =4;
        $qrcode->save();
        
        if( $qrcode->item)
        {
            if($qrcode->isQrcodeMultiAssign && $qrcode->item->deleted_at != NULL )
            {
                $qrcode->item->deleted_at=NULL;
                $qrcode->item->save();
            }

        }
        $this->addResponse(trans('messages.renewed'))->addStatusCode(201);
        return $this->response();
    }

    

    /**
     * Rename QR Code
     * @bodyParam qrcode_url string required exists in qrcodes,url
     * @bodyParam name string required
     * @response
     * {
     * "success": true,
     * "message": "QR Code Renamed Successfully",
     * "status_code": 200
     *}
     * @return object
     */
    public function rename(Request $request)
    {
        $validate_request = Validator::make($request->all(), [
            'qrcode_url' => ['required'],
            'name' => ['required'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }
       $check_qrcode= Qrcode::where('name', $request->input('name'))
       ->where('user_id', auth('api')->user()->id)
       ->where('qrcode_url','!=',$request->input('qrcode_url'))
       ->first();

       if($check_qrcode)
       throw new ApiException('You have QR Code with same name', 400);
       

        $qrcode = Qrcode::where('qrcode_url', $request->input('qrcode_url'))->first();

        if (is_null($qrcode) ){
            throw new ApiException('QR Code Not Found', 400);
        }

        $qrcode->name = $request->input('name');
        $qrcode->save();
        $this->addResponse(trans('messages.renamed'))->addStatusCode(201);
        return $this->response();
    }
    /**
     * Assign QR Code To Me
     * @bodyParam qrcode_url string required exists in qrcodes,url
     * @response
     * {
     * "success": true,
     * "message": "QR Code Assigned Successfully",
     * "status_code": 200
     *}
     * @return object
     */
    public function assignToMe(Request $request)
    {
        $validate_request = Validator::make($request->all(), [
            'qrcode_url' => ['required'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $qrcode = Qrcode::where('qrcode_url', $request->input('qrcode_url'))->first();

        if (is_null($qrcode) || in_array($qrcode->status, [2, 4, 5, 6]) || $qrcode->user_id !==null ){
            throw new ApiException('QR Code Not Found', 400);
        }

        $qrcode->user_id = auth('api')->user()->id;
        $qrcode->status = 2;
        $qrcode->save();
        $this->addResponse(trans('messages.assigned'))->addStatusCode(201);
        return $this->response();
    }
}
