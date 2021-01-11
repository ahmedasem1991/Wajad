<?php

namespace App\Http\Resources;

use App\Qrcode;
use App\QrcodeLog;
use Illuminate\Http\Resources\Json\JsonResource;

class SmallQrcodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data=null;
        if($this->item)
        {
            if($this->item->post)
            {
                $data=new QrPostResource($this->item->post);
            }

        }


        $post=null;
        if($this->item){
            $post=  $this->item->post ? new QrPostResource($this->item->post) : null;
    }
        $log = QrcodeLog::where('qrcode_id', $this->id)->get();


        return [
            'id' => $this->id,
            'url' => $this->qrcode_url,
            'image' => $this->image,
            'type' =>  Qrcode::TYPES[(int) $this->type] ?? "",
            'status' => Qrcode::STATUS[(int) $this->status] ?? "",
            'unique_reference_number' => $this->unique_reference_number,
            'generate_reference_number' => $this->generate_reference_number,
            'assign_reference_number' => $this->assign_reference_number,
            'name' => $this->name,
            //'user' => new UserResource($this->user),
            // 'package' => $this->package,
            // 'product' => $this->package_product_pivot->product,
            //'item' => new ItemInQRCodeResource($this->item),
            //'log' => QrcodeLogResource::collection($log),
            //'post' => $post,
            'available_period' => $this->available_period,
            'start_at' => $this->start_at ?  substr($this->start_at, 0, -3) : null,
            'end_at' => $this->end_at ?  substr($this->end_at, 0, -3)  : null,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
        ];
    }
}
