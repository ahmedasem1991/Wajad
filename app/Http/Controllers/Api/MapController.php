<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class MapController extends Controller
{
    const TYPES = [
        'lost',
        'found',
        'office'
    ];

    public function __inkove(Request $request, $type = null)
    {
        if (is_null($type)) {


            // return
        }

        return;
    }
}
