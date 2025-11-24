<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        if ($request->has('subCategories')) {
            $this->load('subcategories');
        }

        return [
            'id' => $this->id,
            'name' => $this->{'name_'.app()->getLocale()},
            'description' => $this->{'description_'.app()->getLocale()} ?? '',
            'image' => $this->image ? env('APP_URL').'/'.$this->image : '',
            'item_coount' => $this->item_count ?? 0,
            'subCategories' => SubCategoryResource::collection($this->whenLoaded('subcategories')),
        ];
    }
}
