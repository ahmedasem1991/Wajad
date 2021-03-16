<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesiboNotificationController extends Controller
{
    /**
     * @param Request $request
     * @return string
     * @throws ApiException
     */
    public function  __invoke(Request $request)
    {
        if($request->method() == 'POST'){
            $data = $request->all();
            if ($data['events'][0]['type'] == 'message'){
                try {
                    DB::table('mesibo_notification')->insert(['payload' => json_encode($request->all())]);
                    return 'MESIBO OK';
                } catch (\Exception $e) {
                    DB::table('mesibo_notification')->insert(['payload' => $e->getMessage()]);
                    return $e->getMessage();
                }
            }
            return 'MESIBO OK';
        }

//
//        $validate_request = Validator::make($request->all(), [
//            'data' => ['required', 'array', 'between:1,3'],
//            'data.*.answers' => ['required', 'min:6', 'max:500'],
//            'data.*.question_id' => ['required', 'exists:questions,id'],
//        ]);
//
//        if ($validate_request->fails()) {
//            throw new ApiException($validate_request->errors()->first(), 400);
//        }
//
//        $p = PostRequest::where('post_id', '=',$post->id)->where('user_id', '=', auth('api')->user()->id)->get();
//
//        if (!$p->isEmpty()){
//            throw new ApiException('You Already Made A Request', 400);
//        }
//
//        $post_request = PostRequest::create([
//            'post_id' => $post->id,
//            'user_id' => auth('api')->user()->id,
//        ]);
//
//        array_map(function ($answer) use ($post, $post_request) {
//
//            $question = Question::find($answer['question_id']);
//
//            if (!$question->Post()->get()->contains($post->id)) {
//                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.post')]), 400);
//            }
//            $PostRequest =   PostRequest::where('post_id', $question->post->id)
//                ->where('user_id', auth('api')->user()->id)->first();
//            Answer::create([
//                'answers' => $answer['answers'],
//                'question_id' => $answer['question_id'],
//                'user_id' => auth('api')->user()->id,
//                'post_request_id' => $post_request->id,
//            ]);
//        }, $request->data);
//
//
//        if($post->corporate_id !=NULL || $post->publisher->isAdmin())
//        {
//            //send Broadcast Notification
//            $level='info';
//            $message='You had a new post request for your post "'.$post->title .' "';
//            if($post->publisher->isAdmin())
//            $url=Nova::path().'/resources/all-posts/'.$post->id;
//            else
//            $url=Nova::path().'/resources/posts/'.$post->id;
//            User::find($post->publisher_id)->notify(new BroadcastNotification($level,$message,$url));
//
//        }
//        if($post->publisher->isUser()){
//            //send FCM
//            $badge =getBadge($post->founder);
//            $data=sendPostRequestFCM($post->founder,auth('api')->user(),$post,$badge,$post_request->id);
//            $post->founder->notify(new SendFCMNotification($post->founder,$data));
//
//        }
//
//        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);
//        return $this->response();
    }
}
