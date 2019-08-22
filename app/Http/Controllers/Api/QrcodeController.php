<?php

namespace App\Http\Controllers\Api;

use App\Qrcodes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\QrcodeResource;

class QrcodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Qrcodes $qr_code)
    {
        return new QrcodeResource($qr_code);        
    }
}
