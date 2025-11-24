<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporateResource extends JsonResource
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
            'name' => $this->{'name_'.app()->getLocale()},
            'address' => $this->{'address_'.app()->getLocale()},
            'details' => $this->{'details_'.app()->getLocale()},
            'mobile_number' => $this->country ? $this->country->country_code.$this->mobile_number : ''.$this->mobile_number,
        ];
    }
}
