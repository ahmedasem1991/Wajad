<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Qrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterQRCodeController extends Controller
{
    public function __invoke()
    {
        $validate_request = Validator::make(request()->all(), [
            'item_id' => ['required', 'exists:items,id'],
            'qrcode_id' => ['required', 'exists:qrcodes,id'],

        ]);

        if ($validate_request->fails()) {
            $this->addResponse($validate_request->errors()->first())->addStatusCode(400);
            return $this->response();
        }
        try {
            $status = 3;
            $QRCode = $this->find($request->qrcode_id);
            $QRCode->status == 3 ? $status = 4 : $status = 5;

            $QRCode->update([
                'item_id' => $request->item_id,
                'status' => $status,
                'start_at' => Carbon::now()->toDateTimeString(),
                'end_at' => Carbon::now()->toDateTimeString() + $QRCode->available_period,
            ]);
            $this->addResponse(trans('messages.successfully_registered'))->addStatusCode(201);
            Log::INFO($this->response());
            return $this->response();
        } catch (Exception $e) {
            $this->addResponse($e->getMessage)->addStatusCode(409);
            Log::ERROR($this->response());
            return $this->response();
        }
    }
}
