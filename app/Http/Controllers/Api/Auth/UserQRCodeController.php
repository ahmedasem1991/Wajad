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
                auth('api')->user()->qrcodes()->singleAssign()->inStock()->get()
            ),
            'multi' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->multiAssign()->status(1)->get()
            ),
            'active' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->registered()->get()
            ),
            'expired' => QrcodeResource::collection(
                auth('api')->user()->qrcodes()->registered()->get()
            )
        ]);

        return $qrcodes;
    }
}
