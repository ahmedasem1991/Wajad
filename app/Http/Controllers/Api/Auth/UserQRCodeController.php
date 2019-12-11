<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QrcodeResource;

class UserQRCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $qrcodes = collect([
            'single' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->status(1)->type(1)->get()
            ),
            'multi' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->status(1)->type(2)->get()
            ),
            'active' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->status(4)->get()
            ),
            'expired' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->status(4)->get()
            )
        ]);
        
        return $qrcodes;
    }
}
