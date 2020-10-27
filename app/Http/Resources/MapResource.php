<?php

namespace App\Http\Resources;

use App\Corporate;
use App\Post;
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
        $image='';
        $type = '';
        if ($this->resource instanceof Post){
            $type = Post::Status[$this->status];
            $image = $this->images[0];
        }
        if ($this->resource instanceof Corporate){
            $type = 'office';
            $image= $this->image;
        }

        return [
            'id' => $this->id,
            'name' => $this->{'name_' . app()->getLocale()} ?? $this->title,
            'details' => $this->{'details_' . app()->getLocale()} ?? $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'image' => (string) env("APP_URL") . "/" . $image,
            'type' => $type,
            'address' => $this->address ?? '',
            'post' => $this->resource instanceof Post ? PostResource::make($this->resource) : null,
        ];
    }
}
