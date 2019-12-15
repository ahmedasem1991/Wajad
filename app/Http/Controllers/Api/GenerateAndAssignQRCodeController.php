<?php

namespace App\Http\Controllers\Api;

use App\Qrcode;
use App\Package;
use Carbon\Carbon;
use App\AssignQrcode;
use App\GenerateQrcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Jobs\GenerateAndAssigneQrcodeJob;

/**
 * @group QR Codes
 */
class GenerateAndAssignQRCodeController extends Controller
{
    /**
     * Generate & Assign QRcodes (after payment)
     * @bodyParam package_id int required exists in packages
     * @bodyParam count int min:1
     * @response 
     * {
     * "success": true,
     *"message": "qrcode created successfully.",
     *"status_code": 200
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
        $i = 0;
        for ($i = 0; $i < $request->count; $i++) {
            $package = Package::find($request->package_id);
            $now = Carbon::now();

            $middle = $now->year . $now->month . $now->day . '-' . $now->hour . $now->minute;
            $generate_reference_number = NULL;
            $assign_reference_number = 'C-' . $middle . $now->second;
            $generate_id = NULL;

            if (count(Qrcode::inStock()->type($package->type)->get()) < $package->quantity) {
                $generate_reference_number = 'N-' . $middle . $now->second;
                $generateQRCode = GenerateQrcode::create([
                    'reference_number' => $generate_reference_number,
                    'type' => $package->type,
                    'quantity' => $package->quantity,
                    'created_by' => auth('api')->user()->id,
                    'created_from' => 'mobile',
                ]);

                $generate_id = $generateQRCode->id;
            }

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

            $QRcodesData = [
                'generate_id' => $generate_id,
                'generate_reference_number' => $generate_reference_number,
                'assign_reference_number' => $assign_reference_number,
                'quantity' => $package->quantity,
                'status' => 2,
                'type' => $package->type,
                'auth_id' => auth('api')->user()->id,
                'user_id' => auth('api')->user()->id,
                'corporate_id' => NULL,
                'available_period' => str_replace(" Day/s", "", $package->period),
            ];

            GenerateAndAssigneQrcodeJob::dispatch($QRcodesData);
        }
        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.qrcode')]))->addStatusCode(201);
        Log::INFO($this->response());
        return $this->response();
    }
}
