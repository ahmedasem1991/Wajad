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
            "name" =>  $this->name,
            "email" =>  $this->email,
            "status" => $this->status,
            "mobile_number" => $this->mobile_number,
            "receive_emails" => (bool) $this->receive_emails,
            "receive_push_notifications" => (bool) $this->receive_push_notifications,
            "is_email_verified" =>  (bool) $this->email_verified_at,
            "is_mobile_number_verified" =>  (bool) $this->is_mobile_number_verified,
            "default_distance_unit" =>  $this->default_distance_unit,
        ];
    }
}
