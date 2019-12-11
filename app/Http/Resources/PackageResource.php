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

    public function toArray($request)
    {
        return [
            'name' => $this->{'name_' . app()->getLocale()},
            'description' => $this->{'description_' . app()->getLocale()},
            'qr_codes' => $this->products_per_package,
            'price' => $this->getOriginal('price'),
            'currency' => env('CURRENCY', 'SAR'),
            'period' => $this->period,
            'images' => $this->media,
        ];
    }
}
