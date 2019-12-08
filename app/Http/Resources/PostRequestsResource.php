<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostRequestsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'is_request_valid' => $this->is_request_valid,
            'user' => new UserResource($this->requested_user),
            'date' => $this->created_at->toDateTimeString(),
        ];
    }
}
