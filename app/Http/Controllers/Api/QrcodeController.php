<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Qrcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QrcodeController extends Controller
{
    /**
     * Rename QR Code
     * @bodyParam qrcode_url required string exists in qrcodes
     * @bodyParam name required string
     * @response
     * {
     * "success": true,
     * "message": "QR Code Renamed Successfully",
     * "status_code": 200
     *}
     * @return void
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

        $qrcode = Qrcode::where('qrcode_url', $request->input('qrcode_url'))->first();

        if (is_null($qrcode) ){
            throw new ApiException('QR Code Not Found', 400);
        }

        $qrcode->name = $request->input('name');
        $qrcode->save();
        $this->addResponse(trans('messages.renamed'))->addStatusCode(201);
        return $this->response();
    }
}
