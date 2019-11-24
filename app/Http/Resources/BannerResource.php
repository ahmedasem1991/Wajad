<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{

    public function toArray($request)
    {
        $images_main_path = env("APP_URL") . "/";

        if ($this->type == 'ads') {
            return [
                'type' => 'ads',
                'image' => $images_main_path . $this->image,
            ];
        }

        if ($this->type == 'url') {
            return  [
                'type' => 'url',
                'image' => $images_main_path . $this->image,
                'url' => $this->url
            ];
        }

        if ($this->type == 'item') {
            $response = [
                'type' => 'item',
                'item_id' => $this->item_id ?? 0,
                'latitude' => $this->item->post->latitude ?? 0,
                'longitude' => $this->item->post->longitude ?? 0,
                'name' => $this->item->title ?? "",
                'description' => $this->item->description ?? "",
                'image' => $images_main_path . (string) $this->item->images()->first('image')['image'] ?? "",
                'status' => $this->item->getStatus()
            ];

            if ($this->item->isLost()) {
                array_merge($response, [
                    'data' => $this->item->post->losted_at ?? ""
                ]);
            }

            if ($this->item->isFound()) {
                array_merge($response, [
                    'data' => $this->item->post->founded_at ?? ""
                ]);
            }

            return $response;
        }
    }
}
