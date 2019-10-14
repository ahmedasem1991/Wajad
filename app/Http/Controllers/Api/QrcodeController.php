<?php

namespace App\Http\Controllers\Api;

use App\Qrcode;
 
use App\Http\Controllers\Controller;
use App\Http\Resources\QrcodeResource;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
 

class QrcodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Qrcode $qr_code)
    {
        return new QrcodeResource($qr_code);        
    }

    public function userqrcodes(Request $request,$user_id)
    {
         
        $QRodes = QueryBuilder::for(Qrcode::class)
        ->with('user')
        ->with('item')
        ->user($user_id)
        ->allowedFilters([
            Filter::scope('item'),//Item ID
            'id','reference_number', 'assign_reference_number','type','qrcode_url',
        ])->paginate($request->get('per_page', 15));

        return $this->jsonResponse($QRodes);
    }
 

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registerQrcodes(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'qrcode_id' => ['required', 'exists:qrcodes,id'],
            'item_id' => ['required', 'exists:items,id'],
             
        ]);
        
        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
            return $this->response();
        }
        return (new Qrcode)->registerQrcode($request);
    }
}
