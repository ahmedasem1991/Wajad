<?php

namespace App\Http\Resources;

use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'title' => $this->title,
            'description' => $this->description,
            'status' => Post::Status[$this->status],
            'attached_to_item' => (bool) $this->item,
            'item' => $this->when((bool) $this->item, $this->items),
            'subCategory' => new SubCategoryResource($this->subcategory),
            'model' => new ModelResource($this->model),
            'color' => new ColorResource($this->color)
        ];
    }
}
