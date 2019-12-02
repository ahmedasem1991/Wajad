<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'id' => $this->id,
            'page' => Str::lower($this->key),
            'title' => $this->{'title_' . app()->getLocale()},
            'body' => $this->{'body_' . app()->getLocale()},
            // 'image' => $this->image ? env('APP_URL') . '/' . $this->image : null
        ];
    }
}
