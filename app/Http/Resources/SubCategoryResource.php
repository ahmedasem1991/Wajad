<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->has('categories')) {
            $this->load('category');
        }
        return [
            'id' => $this->id,
            'name' => $this->{'name_' . app()->getLocale()},
            'description' => $this->{'description_' . app()->getLocale()},
            'image' =>  $this->image ? env('APP_URL') . "/" . $this->image : '',
            'categories' => new CategoryResource($this->whenLoaded('category'))
        ];
    }
}
