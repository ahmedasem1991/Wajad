<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FcmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $info['title'] = $this->data[0][app()->getLocale()]['title'];
        $info['body'] = $this->data[0][app()->getLocale()]['body'];
        $info['type'] = $this->data[0]['type'] ?? null;
        $info['deeplink'] = $this->data[0]['deeplink'] ?? null;
        $info['post'] = $this->data[0]['post'] ?? null;
        $info['item'] = $this->data[0]['item'] ?? null;
        $info['image'] = $this->data[0]['image'] ?? null;
        $info['url'] = $this->data[0]['url'] ?? null;
        $info['id'] = $this->data[0]['id'] ?? null;
        $info['badge'] = $this->data[0]['badge'];

        return [
            'id' => $this->id,
            'payload' => $info,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'read_at' => $this->read_at ? $this->created_at->toDateTimeString() : null,
        ];
    }
}
