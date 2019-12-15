<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QrcodeResource extends JsonResource
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
            'url' => $this->qrcode_url,
            'user' => new UserResource($this->user),
            // 'package' => $this->package,
            // 'product' => $this->package_product_pivot->product,
            'item' => new ItemResource($this->item),
            'available_period' => $this->available_period,
            'start_at' => $this->start_at ? $this->start_at->toDateTimeString() : null,
            'end_at' => $this->end_at ? $this->end_at->toDateTimeString() : null,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
        ];
    }
}
