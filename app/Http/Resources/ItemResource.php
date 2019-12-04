<?php

namespace App\Http\Resources;

use App\Item;
use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details ?? '',
            'status' => Post::Status[$this->status] ?? '',
            'owner' => new UserResource($this->owner),
            'model' => new ModelResource($this->model),
            'color' => new ColorResource($this->color),
            'brand' => new BrandResource($this->brand),
            'date' => $this->created_at->toDateTimeString(),
            'images' =>  ItemImagesResource::collection($this->images),
        ];
    }
}
