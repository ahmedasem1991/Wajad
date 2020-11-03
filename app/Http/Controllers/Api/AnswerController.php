<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\User;
use App\Answer;
use App\Question;
use App\PostRequest;
use Laravel\Nova\Nova;
use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendFCMNotification;
use App\Notifications\BroadcastNotification;

/**
 * @group Post Request
 */
class AnswerController extends Controller
{
    /**
     * This item is mine
     * @urlParam post_id required int, exists in posts
     * @bodyParam data array required
     * @bodyParam data.*.answers string required min:20, max:500
     * @bodyParam data.*.question_id integer required exists:questions,id
     * @bodyParam token Barier-token required
     * @response {
     * "success": true,
     *  "message": "Post request created successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function  __invoke(Request $request, Post $post)
    {
        $validate_request = Validator::make($request->all(), [
            'data' => ['required', 'array', 'between:1,3'],
            'data.*.answers' => ['required', 'min:6', 'max:500'],
            'data.*.question_id' => ['required', 'exists:questions,id'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $p = PostRequest::where('post_id', '=',$post->id)->where('user_id', '=', auth('api')->user()->id)->get();

        if (!$p->isEmpty()){
            throw new ApiException('You Already Made A Request', 400);
        }

        $post_request = PostRequest::create([
            'post_id' => $post->id,
            'user_id' => auth('api')->user()->id,
        ]);

        array_map(function ($answer) use ($post, $post_request) {

            $question = Question::find($answer['question_id']);

            if (!$question->Post()->get()->contains($post->id)) {
                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.post')]), 400);
            }
            $PostRequest =   PostRequest::where('post_id', $question->post->id)
                ->where('user_id', auth('api')->user()->id)->first();
            Answer::create([
                'answers' => $answer['answers'],
                'question_id' => $answer['question_id'],
                'user_id' => auth('api')->user()->id,
                'post_request_id' => $post_request->id,
            ]);
        }, $request->data);

        
        if($post->corporate_id !=NULL || $post->publisher_id->isAdmin())
        {
            //send Broadcast Notification
            $level='info';
            $message='You had a new post request for your post "'.$post->title .' "';
            $url=Nova::path().'/resources/posts/'.$post->id;
            User::find($post->publisher_id)->notify(new BroadcastNotification($level,$message,$url));

        }
        else{
            //send FCM
            $badge =getBadge($post->founder);
            $data=sendPostRequestFCM($post->founder,auth('api')->user(),$post,$badge,$post_request->id);
            $post->founder->notify(new SendFCMNotification($post->founder,$data));

        }
 
        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);
        return $this->response();
    }
}
