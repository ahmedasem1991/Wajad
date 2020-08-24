<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPostAnswersResource extends JsonResource
{
    public function toArray($request)
    {
        $user = new UserResource($this->postRequestUser);

        $questions = collect(array(
            'questions' => //QuestionResource::collection(
                $this->post->questions()->with(array(
                        'answers' => function ($query) use ($user) {
                             $query->select('answers');
                        }
                ))->select('id','question')->get()
           // )
        ));
        return $questions->merge($user);
    }
}
