<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function getImage($item)
    {
        $images_main_path = env("APP_URL") . "/";

        if ($item->type == 'ads' || $item->type == 'url') {
            return  $images_main_path . $item->image;
        }

        if ($item->type == 'item') {
            return (string) $this->item->images()->first('image')['image'] ?: null;
        }
    }

    public function getItem($item)
    {
        return $item->item_id ?
            [
                'latitude' => $item->post->latitude ?? 0,
                'longitude' => $item->post->longitude ?? 0,
                'name' => $item->title ?? "",
                'description' => $item->description ?? "",
                // 'status' => $item->getStatus()
            ] : null;
    }

    public function toArray($request)
    {
        return [
            'type' => $this->type,
            'image' => $this->getImage($this) ?? "",
            'url' => $this->url ?? "",
            'item_id' => $this->item_id ?? null,
            'item' => $this->getItem($this) ?? null
        ];
    }
}
