<?php

namespace App\Http\Resources;

use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        if($this->corporate)
        {
            $this->publisher->name=$this->corporate->{'name_' . app()->getLocale()};
            $this->publisher->mobile_number=$this->corporate->country ? $this->corporate->country->country_code .$this->corporate->mobile_number: '' .$this->corporate->mobile_number;
            session()->put('corporate_publisher','true');

        }
        $value=false;
        foreach($this->postRequests as $postrequest)
        {
            if($postrequest->is_request_valid==1)
            $value=true;
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'approval_status' => $this->approval_status,
            'open_status' => $this->open_status,
            'longitude' => $this->longitude,
            'end_at' => $this->end_at,
            'latitude' => $this->latitude,
            'reward' => $this->reward,
            'description' => $this->description,
            'status' => Post::Status[$this->status] ?? '',
            'attached_to_item' => (bool) $this->item,
            'item' => new ItemResource($this->item),
            'sub_category' => new SubCategoryResource($this->subcategory),
            'model' => new ModelResource($this->model),
            'brand' => new BrandResource($this->brand),
            'color' => new ColorResource($this->color),
            'date' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'images' => $this->images ?? [],
            'questions' =>  QuestionResource::collection($this->questions),
            'allow_post_requests' => $value,
            'claimers' =>  PostRequestsResource::collection($this->postRequests),
            'city' => new CityResource($this->city),
            'publisher' => new UserResource($this->publisher),
            'corporate' => new CorporateResource($this->corporate),
            'show_name' => $this->show_name,
            'show_number' => $this->show_number,

        ];
    }
}
