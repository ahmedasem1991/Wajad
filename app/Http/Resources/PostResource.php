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
            'approval_status' => $this->approval_status,
            'reward' => $this->reward,
            'description' => $this->description,
            'status' => Post::Status[$this->status] ?? '',
            'attached_to_item' => (bool) $this->item,
            'item' => new ItemResource($this->item),
            'sub_category' => new SubCategoryResource($this->subcategory),
            'model' => new ModelResource($this->model),
            'color' => new ColorResource($this->color),
            'created_at' => $this->created_at->toDateTimeString(),
            'images' =>  PostImagesResource::collection($this->images),
            'post_requests' =>  PostRequestsResource::collection($this->postRequests),
            'city' => new CityResource($this->city),
            'publisher' => new UserResource($this->publisher),
        ];
    }
}
