<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->has('countries')) {
            $this->load('country');
        }
        return [
            'id' => $this->id,
            'name' => $this->{'name_' . app()->getLocale()},
            'countries' => new LocationResource($this->whenLoaded('country'))
        ];
    }
}
