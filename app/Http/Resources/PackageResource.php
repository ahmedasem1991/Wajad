<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    const PERIOD = [
        1 => 'Dialy',
        2 => 'Weekly',
        3 => 'Monthly',
        4 => 'Yearly',
    ];
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'qr_codes' => $this->products_per_package,
            'price' => $this->getOriginal('price'),
            'currency' => env('CURRENCY', 'SAR'),
            'period' => self::PERIOD[$this->period],
            'images' => $this->media,
        ];
    }
}
