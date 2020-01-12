<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeResource extends JsonResource
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
            'name' => $this->{'name_' . app()->getLocale()},
            'details' => $this->{'details_' . app()->getLocale()} ?? '',
            'address' => $this->{'address_' . app()->getLocale()} ?? '',
            'location' => $this->location ?? '',
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'status' => (bool) $this->status ?? 0,
            'image' =>  $this->image ? env('APP_URL') . "/" . $this->image : '',
        ];
    }
}
