<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id ?? null,
            'page' => Str::lower($this->key ?? ''),
            'title' => $this->{'title_'.app()->getLocale()} ?? '',
            'body' => $this->{'body_'.app()->getLocale()} ?? '',
            // 'image' => $this->image ? env('APP_URL') . '/' . $this->image : null
        ];
    }
}
