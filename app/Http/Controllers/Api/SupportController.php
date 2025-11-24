<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'name' => ['required', 'min:6', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:6', 'max:20'],
            'message' => ['required'],

        ]);
        if ($validate_request->fails()) {
            $this->addResponse($validate_request->errors())->addStatusCode(400);

            return $this->response();
        }

        Support::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'message' => request('message'),

        ]);
        $this->addResponse(trans('messages.successfully_contactus'))->addStatusCode(201);

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
