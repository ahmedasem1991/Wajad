<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostRequestsResource extends JsonResource
{
    public function toArray($request)
    {
        $this_request = $this;

        $array['questions'] = $this->post->questions()->with([
            'answers' => function ($query) use ($this_request) {
                $query->where('user_id', $this->user_id);
            }
        ])->select('id', 'question')->get();
        dd($array['questions']);
        return new UserPostAnswersResource($this);

        return [
            'id' => $this->id,
            'is_request_valid' => $this->is_request_valid,
            'cliamers' => new UserPostAnswersResource($this),
            'date' => $this->created_at ? $this->created_at->toDateTimeString() : null,
        ];
    }
}
