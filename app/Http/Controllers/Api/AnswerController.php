<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Answer;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\PostRequest;
use App\Question;
use Illuminate\Support\Facades\Validator;

/**
 * @group Answers
 */
class AnswerController extends Controller
{
    /**
     * Answer question
     * @urlParam post_id required int, exists in posts
     * @response {
     * "success": true,
     *  "message": "Answers created successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function  __invoke(Request $request, Post $post)
    {
        $validate_request = Validator::make($request->all(), [
            'data' => ['required', 'array', 'size:3'],
            'data.*.answers' => ['required', 'min:20', 'max:500'],
            'data.*.question_id' => ['required', 'exists:questions,id'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        array_map(function ($answer) use ($post) {

            $question = Question::find($answer['question_id']);

            if (!$question->Post()->get()->contains($post->id)) {
                throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.post')]), 404);
            }
         $PostRequest=   PostRequest::where('post_id', $question->post->id)
            ->where('user_id',auth('api')->user()->id)->first();
            Answer::create([
                'answers' => $answer['answers'],
                'question_id' => $answer['question_id'],
                'user_id' => auth('api')->user()->id,
                'post_request_id' => $PostRequest->id,
            ]);
        }, $request->data);

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.answer')]))->addStatusCode(201);

        return $this->response();
    }
}
