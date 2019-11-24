<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->has('publisher')) {
            $this->load('publisher');
        }
        if ($request->has('founder')) {
            $this->load('founder');
        }
        if ($request->has('owner')) {
            $this->load('owner');
        }
        if ($request->has('color')) {
            $this->load('color');
        }
        if ($request->has('model')) {
            $this->load('model');
        }
        if ($request->has('subcategory')) {
            $this->load('subcategory');
        }
        if ($request->has('categories')) {
            $this->load('category');
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'appearance_status' =>  $this->appearance_status,
            'open_status' =>  $this->open_status,
            'approval_status' =>  $this->approval_status,
            'reports_number' =>  $this->reports_number,
            'losted_at' =>  $this->losted_at,
            'founded_at' =>  $this->founded_at,
            'latitude' =>  $this->latitude,
            'longitude' =>  $this->longitude,
            // 'item' => new CategoryResource($this->whenLoaded('category')),
            'sub_category' => new SubCategoryResource($this->whenLoaded('subcategory')),
            'model' => new ModelResource($this->whenLoaded('model')),
            'color' => new ColorResource($this->whenLoaded('color')),
            'owner' => new UserResource($this->whenLoaded('owner')),
            'founder' => new UserResource($this->whenLoaded('founder')),
            'publisher' => new UserResource($this->whenLoaded('publisher')),
        ];
    }
}
