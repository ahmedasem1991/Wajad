<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MapResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image=$this->images[0] ? $this->images[0] :'';
        return [
            'id' => $this->id,
            'name' => $this->{'name_' . app()->getLocale()} ?? $this->title,
            'details' => $this->{'details_' . app()->getLocale()} ?? $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            // 'image' => (string) env("APP_URL") . "/" . $this->images ?? (string) $this->images()->first('image')['image'] ?? '',
            'image' => (string) env("APP_URL") . "/" . $image,
          
            'address' => $this->address ?? ''
        ];
    }
}
