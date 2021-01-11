<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPostAnswersResource extends JsonResource
{
    public function toArray($request)
    {
        if ($this->postRequestUser) {
            $user = new UserResource($this->postRequestUser);

            $questions = collect([
                'questions' => QuestionResource::collection(
                    $this->post->questions()->with([
                        'answers' => function ($query) use ($user) {
                            $query->where('answers.user_id','=', $user->id)->withTrashed();
                        }
                    ])->select('id', 'question')->get()
                )
            ]);

            return $questions->merge($user);
        }
    }
}
