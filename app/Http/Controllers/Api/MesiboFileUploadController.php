<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MesiboFileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('mesibo_uploads'), $fileName);

        return response()->json(url('/mesibo_uploads') .'/'.$fileName);

    }
}
