<?php

namespace App\Http\Resources;

use App\Package;
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
            'qrcodes_count' => $this->quantity,
            'price' => $this->getOriginal('price'),
            'currency' => env('CURRENCY', 'SAR'),
            'period' => $this->period,
            'type' => Package::Types[$this->type] ?? '',
            'incrementally' => $this->incrementally,
        ];
    }
}
