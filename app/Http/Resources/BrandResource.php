<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\SubCategory;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->has('subCategories')) {
            $this->load('subcategory');
        }
        return [
            'id' => $this->id,
            'name' => $this->{'name_' . app()->getLocale()},
            'description' => $this->{'description_' . app()->getLocale()} ?? '',
            'image' =>  $this->image ? env('APP_URL') . "/" . $this->image : '',
            'subCategories' => new SubCategoryResource($this->whenLoaded('subcategory'))
        ];
    }
}
