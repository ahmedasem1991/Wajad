<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactusResource extends JsonResource
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
            // 'key' => $this['key'],
            // 'value' =>$this['value'],
           'Phone-Number-1' => $this->where(['key'=> 'Phone-Number-1'])->pluck('value') ?? '',
           'Phone-Number-2' => $this->where(['key'=> 'Phone-Number-2'])->pluck('value') ?? '',
           'Address-1' => $this->where(['key'=> 'Address-1'])->pluck('value') ?? '',
           'Address-2' => $this->where(['key'=> 'Address-2'])->pluck('value') ?? '',
           'Email-1' => $this->where(['key'=> 'Email-1'])->pluck('value') ?? '',
           'Email-2' => $this->where(['key'=> 'Email-2'])->pluck('value') ?? '',
        ];
    }
}
