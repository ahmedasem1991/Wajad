<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QrcodeLogResource extends JsonResource
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
            'ip' => $this->ip,
            'location' => $this->location,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'device_type' => $this->device_type,
            'qrcode' => QrcodeResource::make($this->qrcode),
            'created_at' => $this->created_at,
        ];
    }
}
