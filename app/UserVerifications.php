<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVerifications extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile_number', 'password',
        'type', 'status', 'verification_code', 'expired_period', 'expired_period', 'email_verified_at', 'corporate_id', 'agreement'
    ];
}
