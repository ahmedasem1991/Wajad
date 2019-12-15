<?php

namespace App\Http\Controllers\Api;

use App\Qrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReregisterQRCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'item_id' => ['required', 'exists:items,id'],
            'qrcode_id' => ['required', 'exists:qrcodes,id'],
        ]);

        if ($validate_request->fails()) {
            $this->addResponse($validate_request->errors()->first())->addStatusCode(400);
            return $this->response();
        }

        $QRCode = Qrcode::find($request->qrcode_id);

        if ($QRCode->type != 2 && $QRCode->status != 4) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.qrcode')]), 404);
        }

        $QRCode->update([
            'item_id' => $request->item_id,
            'status' => 4,
            'start_at' => Carbon::now()->toDateTimeString(),
            'end_at' => Carbon::now()->addDays($QRCode->available_period),
        ]);
        $this->addResponse(trans('messages.registered'), ['model' => trans('messages.attributes.qrcode')])->addStatusCode(201);
        return $this->response();
    }
}
