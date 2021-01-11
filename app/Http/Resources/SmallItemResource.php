<?php

namespace App\Http\Resources;

use App\Item;
use App\Post;
use App\QrcodeLog;
use App\Http\Resources\SmallQrcodeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SmallItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $last_scan=null;
        if($this->qrcode)
        {
            $last_scan = QrcodeLog::where('qrcode_id', $this->qrcode->id)->orderBy('created_at', 'desc')->first();
        }


        return [
            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details ?? '',
            'status' => Post::Status[$this->status] ?? '',
            'deleted_at' => $this->deleted_at ? $this->deleted_at->toDateTimeString() : null,
           // 'owner' => new UserResource($this->owner),
            // 'subcategory' => new SubCategoryResource($this->subcategory),
            // 'model' => new ModelResource($this->model),
            // 'color' => new ColorResource($this->color),
            // 'brand' => new BrandResource($this->brand),
            //'qrcode' => new SmallQrcodeResource($this->qrcode),
          //  'last_scan' => new ItemQrcodeLogResource($last_scan),
            'date' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'images' => $this->images ?? [],

        ];
    }
}
