<?php

namespace App\Http\Controllers\Api;

use Response;
use App\Qrcode;
use App\Package;
use Carbon\Carbon;
use App\AssignQrcode;
use App\GenerateQrcode;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;
use App\Jobs\GenerateAndAssignQrcodeJob;
use App\Jobs\GenerateAndAssigneQrcodeJob;

class GenerateAndAssignQRCodeController extends Controller
{
    public function index(Request $request)
    {
    //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'package_id' => ['required', 'exists:packages,id']
        ]);
        
        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
            return $this->response();
        }
       $Package=Package::find($request->package_id);
       $now = Carbon::now();
       $middle=$now->year.$now->month.$now->day.'-'.$now->hour.$now->minute;
       $generate_reference_number='N-'.$middle.$now->second;
       $assign_reference_number='U-'.$middle.$now->second;

        $GenerateQRCode=GenerateQrcode::create([
            'reference_number'=>$generate_reference_number,
            'type'=>$Package->type,
            'quantity'=>$Package->quantity,
            'created_from'=>'mobile',
         ]);
         logger($Package->period);
         AssignQrcode::create([
            'assign_reference_number'=>$assign_reference_number,
            'assign_to'=>1,
            'user_id'=>$request->user_id,
            'corporate_id'=>NULL,
            'type'=>$Package->type,
            'available_period'=> str_replace(" Month/s","",$Package->period),
            'quantity'=>$Package->quantity,
            'created_from'=>'mobile',
         ]);
         $QRcodesData=[
            'generate_id'=>$GenerateQRCode->id,
            'generate_reference_number'=>$generate_reference_number,
            'assign_reference_number'=>$assign_reference_number,
            'quantity'=>$Package->quantity,
            'status'=>2,
            'type'=>$Package->type,
            'user_id'=>$request->user_id,
            'corporate_id'=>NULL,
            'available_period'=>str_replace(" Month/s","",$Package->period),
         ];

         GenerateAndAssigneQrcodeJob::dispatch($QRcodesData);
 
       $this->addResponse(trans( 'messages.successfully_created' ))->addStatusCode(201);
       Log::INFO($this->response());
       return $this->response();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
