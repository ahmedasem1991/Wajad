<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPostAnswersResource extends JsonResource
{
    public function toArray($request)
    {
        $user = new UserResource($this->postRequestUser);


        $array['questions']=$questions= $this->post->questions()->select('id','question')->get();
        $array['questions']['answers']=$questions->answers()->where('user_id', $user->id)->get()['answers'];
        $array['user']=$user;

        $questions = collect([
               'questions' => //QuestionResource::collection(
                $this->post->questions()->with([
                        'answers' => function ($query) use ($user) {
                            return $query->where('user_id', $user->id);
                        }
                    ])->select('id','question')->get()
           // )
        ]);
        return $array;
    }
}
