<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => (app()->getLocale() == 'ar') ? $this->name_ar : $this->name_en,
            'description' => (app()->getLocale() == 'ar') ? $this->description_ar : $this->description_en,
            'icon' => env('APP_URL') . "/" . $this->icon,
            'item_coount' => $this->item_count
        ];
    }
}
