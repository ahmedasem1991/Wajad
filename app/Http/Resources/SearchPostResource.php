<?php

namespace App\Http\Resources;

use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchPostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => Post::Status[(int) $this->status] ?? '',
            'losted_at' => $this->losted_at ?? '',
            'founded_at' => $this->founded_at ?? '',
            'latitude' => $this->latitude ?? 0,
            'longitude' => $this->longitude ?? 0,
            'image' => env('APP_URL').'/'.$this->images->first()['image'] ?? '',
        ];
    }
}
