<?php

namespace App\Http\Resources;

use App\Qrcode;
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
            'image' => $this->image,
            'type' =>  Qrcode::Types[(int) $this->type] ?? "",
            'status' => Qrcode::STATUS[(int) $this->status] ?? "",
            'unique_reference_number' => $this->unique_reference_number,
            'generate_reference_number' => $this->generate_reference_number,
            'assign_reference_number' => $this->assign_reference_number,
            'user' => new UserResource($this->user),
            // 'package' => $this->package,
            // 'product' => $this->package_product_pivot->product,
            'item' => new ItemResource($this->item),
            'available_period' => $this->available_period,
            'start_at' => $this->start_at ? $this->start_at : null,
            'end_at' => $this->end_at ? $this->end_at  : null,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
        ];
    }
}
