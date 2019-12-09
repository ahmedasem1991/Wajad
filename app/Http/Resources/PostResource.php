<?php

namespace App\Http\Resources;

use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'approvalStatus' => $this->approval_status,
            'reward' => $this->reward,
            'description' => $this->description,
            'status' => Post::Status[$this->status] ?? '',
            'attachedToItem' => (bool) $this->item,
            'item' => new ItemResource($this->item),
            'subCategory' => new SubCategoryResource($this->subcategory),
            'model' => new ModelResource($this->model),
            'color' => new ColorResource($this->color),
            'date' => $this->created_at->toDateTimeString(),
            'images' =>  PostImagesResource::collection($this->images),
            'postRequests' =>  PostRequestsResource::collection($this->postRequests),
            'city' => new CityResource($this->city),
        ];
    }
}
