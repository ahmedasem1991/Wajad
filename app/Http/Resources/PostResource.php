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
            'description' => $this->description,
            'status' => Post::Status[$this->status] ?? '',
            'attached_to_item' => (bool) $this->item,
            'item' => new ItemResource($this->item),
            'subCategory' => new SubCategoryResource($this->subcategory),
            'model' => new ModelResource($this->model),
            'color' => new ColorResource($this->color),
            'date' => $this->created_at,
            'image' => $this->images ? env('APP_URL') . "/" . $this->images->first()['image'] : "",
        ];
    }
}
