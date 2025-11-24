<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'package_name' => $this->package->name,
            'package_description' => $this->package->description,
            'products_title' => $this->product->title,
            'products_description' => $this->product->description,
            'package_product_code' => $this->package_product_name,
        ];
    }
}
