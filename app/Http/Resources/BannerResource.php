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

        if ($item->type == 'post') {
             return (string) $images_main_path . $this->post->images[0] ?? null;
        }
    }

    public function toArray($request)
    {
        return [
            'order' => $this->order,
            'type' => $this->type,
            'image' => $this->getImage($this) ?? "",
            'url' => $this->url ?? "",
            'post_id' => $this->post_id ?? null,
            'post' => PostResource::make($this->post) ?? null,
            'clicks' => $this->clicks ?? null,
            'start_date' => $this->start_date ?? null,
            'end_date' => $this->end_date ?? null,
            'show_period' => $this->show_period ?? 20,
        ];
    }
}
