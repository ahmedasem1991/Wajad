<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->{'name_'.app()->getLocale()},
            'description' => $this->{'description_'.app()->getLocale()} ?? '',
            'image' => $this->image ? env('APP_URL').'/'.$this->image : '',
            'models' => ModelResource::collection($this->whenLoaded('models')),
        ];
    }
}
