<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPostAnswersResource extends JsonResource
{
    public function toArray($request)
    {
        $user = new UserResource($this->postRequestUser);

        $answers=$this->post->questions()->answers()->where('user_id', $user->id)->get()['answers'];
        $questions = collect([
            'questions' => //QuestionResource::collection(
                $this->post->questions()->select('id','question')->get()
           // )
        ]);
        $questions->merge($answers);
        $questions->merge($user);
        return $questions;
    }
}
