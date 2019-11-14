<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserVerifications extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile_number', 'password',
        'type', 'status', 'verification_code', 'expired_period', 'expired_period', 'email_verified_at', 'corporate_id', 'agreement', 'attemp'
    ];

    public function sendCodeWithinMinute()
    {
        return Carbon::now()->diffInSeconds($this->created_at) < 60 || Carbon::now()->diffInSeconds($this->updated_at) < 60;
    }
}
