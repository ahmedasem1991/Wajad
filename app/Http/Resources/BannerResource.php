<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray($request)
    {
        $images_main_path = env("APP_URL") . "/";

        return [
            'type' => $this->type,
            'image' => $images_main_path . $this->image,
            'url' => $this->url ?? "",
            'item_id' => $this->item_id ?? 0,
            'latitude' => $this->item->post->latitude ?? 0,
            'longitude' => $this->item->post->longitude ?? 0,
            'name' => $this->item->title ?? "",
            'description' => $this->item->description ?? "",
            'image' => $images_main_path . (string) $this->item->images()->first('image')['image'] ?? "",
            'status' => $this->item->getStatus()
        ];
    }
}
