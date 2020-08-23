<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "name" =>  $this->name,
            "email" =>  $this->email,
            "status" => $this->status,
            "mobile_number" => $this->country ? $this->country->country_code .$this->mobile_number: '' .$this->mobile_number,
            "receive_emails" => (bool) $this->receive_emails,
            "receive_push_notifications" => (bool) $this->receive_push_notifications,
            "is_email_verified" =>  (bool) $this->email_verified_at,
            "is_mobile_number_verified" =>  (bool) $this->is_mobile_number_verified,
            "default_distance_unit" =>  $this->default_distance_unit,
            "quick_user_id" =>  $this->quick_user_id,
            "quick_user_email" =>  $this->email,
            "quick_user_password" =>  $this->quick_user_password,
            'image' =>  $this->image ? env('APP_URL') . "/" . $this->image : '',
            'country' => $this->country,
        ];
    }
}
