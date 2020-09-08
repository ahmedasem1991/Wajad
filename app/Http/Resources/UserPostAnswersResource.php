<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPostAnswersResource extends JsonResource
{
    public function toArray($request)
    {
        if($this->postRequestUser){
        $user = new UserResource($this->postRequestUser);

        $questions = collect([
            'questions' => QuestionResource::collection(
                $this->post->questions()->with([
                        'answers' => function ($query) use ($user) {
                             $query->where('user_id', $user->id)->withTrashed();
                        }
                ])->select('id','question')->get()
            )
                ]);

                        //  $answers = collect([
        //      'answers' => \App\Answer::where('post_request_id',$this->id)->where('user_id', $user->id)
        //      ->with('question')->get()
        //         ]);
        return $questions->merge($user);
        }else return null;
    }
}
