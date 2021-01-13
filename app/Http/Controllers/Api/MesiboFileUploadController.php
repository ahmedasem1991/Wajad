<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MesiboFileUploadController extends Controller
{
    public function upload(Request $request)
    {

        logger($request->all());
        $validator= Validator::make($request->all(), [
            'file' => ['required'],
        ]);
        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
         }

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('mesibo_uploads'), $fileName);

        return response()->json(url('/mesibo_uploads') .'/'.$fileName);

    }
}
