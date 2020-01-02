<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostRequestsResource extends JsonResource
{
    public function toArray($request)
    {
        return new UserPostAnswersResource($this);

        return [
            'id' => $this->id,
            'is_request_valid' => $this->is_request_valid,
            'cliamers' => new UserPostAnswersResource($this),
            'date' => $this->created_at->toDateTimeString(),
        ];
    }
}
