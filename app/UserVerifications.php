<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserVerifications extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'mobile_number', 'password',
        'type', 'status', 'verification_code', 'expired_period', 'expired_period', 'email_verified_at', 'corporate_id', 'agreement', 'attemp'
    ];

    public function sendCodeWithinMinute()
    {
        return Carbon::now()->diffInSeconds($this->created_at) < 60 || Carbon::now()->diffInSeconds($this->updated_at) < 60;
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->mobile_number;
    }
}
