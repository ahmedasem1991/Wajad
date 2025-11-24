<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Mesibo
 */
class MesiboFileUploadController extends Controller
{
    /**
     * Upload File
     *
     * @bodyParam file file required
     *
     * @response
     * {
     *     "data": "http://api.wajad.test/mesibo_uploads/1610624495.png"
     * }
     *
     * @return void
     */
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $fileName = time().'.'.$request->file->extension();
        // $fileName = $request->id.'.png';
        $request->file->move(public_path('mesibo_uploads'), $fileName);

        return response()->json(['data' => url('/mesibo_uploads').'/'.$fileName], 200);

    }
}
