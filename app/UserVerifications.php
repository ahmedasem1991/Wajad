<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserVerifications extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'verification_code',
        'code_valid_for',
        'attempt',
    ];

    public function sendCodeWithinMinute()
    {
        return Carbon::now()->diffInSeconds($this->created_at) < 60 || Carbon::now()->diffInSeconds($this->updated_at) < 60;
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->mobile_number;
    }

    public function codeValidForEmail()
    {
        return $this->code_valid_for == 'email';
    }

    public function codeValidForMobileNumber()
    {
        return $this->code_valid_for == 'phone';
    }
}
