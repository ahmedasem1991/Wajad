<?php

namespace App\Http\Controllers\Api;


use App\Post;
use App\User;
use App\PostRequest;
use Illuminate\http\Request;
use Illuminate\Support\Carbon;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendFCMNotification;

/**
 * @group Post Request
 */
class RejectPostRequestController extends Controller
{

    /**
     * Reject Post Request
     * @urlParam post_id required int exists in posts
     * @bodyParam user_id integer required exists in users
     * @bodyParam comment text required 
     * @bodyParam token Barier-token required
     * @response {
     * "success": true,
     *  "message": "Post request rejected successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function  __invoke(Request $request, Post $post)
    {
        $validate_request = Validator::make($request->all(), [
            'user_id' => ['required', 'int', 'exists:users,id'],
           // 'comment' => ['required'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if ($post->publisher_id !== auth('api')->user()->id) {
            throw new ApiException(trans('auth.not_authorized'), 400);
        }

        $postRequest = PostRequest::where('post_id', $post->id)->where('user_id', $request->user_id)->first();
        $postRequest->update(['rejected_at' => Carbon::now()->toDateTimeString(), 'comment' => $request->input('comment')]);

        if (
            PostRequest::where('user_id', $request->user_id)
            ->whereNotNull('rejected_at')->count()
            >= env('REJECTED_REQUESTS_NUMBER')
        ) {
            //TO DO: take some actions
        }


         
        $request_user=User::find($request->user_id);
        //send FCM
        $badge =getBadge($request_user);
        $data=sendRejectPostRequestFCM($post->founder,$post,$badge,$postRequest->id);
        $request_user->notify(new SendFCMNotification($request_user,$data));

        $this->addResponse(trans('messages.rejected', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);

        return $this->response();
    }
}
