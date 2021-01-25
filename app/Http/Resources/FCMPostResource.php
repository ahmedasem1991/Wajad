<?php

namespace App\Http\Resources;

use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class FCMPostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'approval_status' => $this->approval_status,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'reward' => $this->reward,
            'description' => $this->description,
            'status' => Post::Status[$this->status] ?? '',
            //'attached_to_item' => (bool) $this->item,
            //'item' => new ItemResource($this->item),
            // 'sub_category' => new SubCategoryResource($this->subcategory),
            // 'model' => new ModelResource($this->model),
            // 'brand' => new BrandResource($this->brand),
            // 'color' => new ColorResource($this->color),
            'date' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'images' => $this->images ?? [],
            // 'questions' =>  QuestionResource::collection($this->questions),
            // 'claimers' =>  PostRequestsResource::collection($this->postRequests),
            // 'city' => new CityResource($this->city),
            'publisher' => new FCMUserResource($this->publisher),
        ];
    }
}
