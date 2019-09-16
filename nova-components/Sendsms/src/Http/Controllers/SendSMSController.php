<?php

namespace Sms\Sendsms\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\Validator;

class SendSMSController
{
	public function store(Request $request)
	{
	 
        $validate_request = Validator::make(request()->all(), [
			'to' => 'required',
			'from' => 'required',
			'text' => 'required'
		]);
	
        if ($validate_request->fails()) {
			return response()->json(['error' => 'Something is required'], 503);
        }

		try {
			$message = Nexmo::message()->send([
				'to' => $request->to,
				'from' => $request->from,
				'text' => $request->text
			]);

			return response()->json(['message' => $message]);
		} catch (\ErrorException $e) {
			return response()->json(['error' => $e->getMessage()], 503);
		}
	}
}
