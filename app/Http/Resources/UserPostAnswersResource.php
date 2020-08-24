<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPostAnswersResource extends JsonResource
{
    public function toArray($request)
    {
        $user = new UserResource($this->postRequestUser);

        // $answers=\App\Answer::where('post_request_id',$this->id)->where('user_id', $user->id)->with([
        //                     'question' => function ($query) {
        //                          $query->select('question');
        //                     }])->get();

         $answers = collect([
             'answers' => \App\Answer::where('post_request_id',$this->id)->where('user_id', $user->id)
             ->with('question')->get()
                ]);
        return $answers->merge($user);
    }
}
