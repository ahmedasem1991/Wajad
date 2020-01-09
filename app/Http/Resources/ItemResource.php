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
            'subcategory' => new SubCategoryResource($this->subcategory),
            'model' => new ModelResource($this->model),
            'color' => new ColorResource($this->color),
            'brand' => new BrandResource($this->brand),
            'qrcode' => new QrcodeResource($this->qrcode),
            'date' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'images' =>  ItemImagesResource::collection($this->images),
        ];
    }
}
