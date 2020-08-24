<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPostAnswersResource extends JsonResource
{
    public function toArray($request)
    {
        $user = new UserResource($this->postRequestUser);

        $questions = collect([
            'questions' => //QuestionResource::collection(
                $this->post->questions()->with([
                        'answers' => function ($query) use ($user) {
                            return $query->where('user_id', $user->id)['answers'];
                        }
                    ])->select('id','question')->get()
           // )
        ]);
        return $questions->merge($user);
    }
}
