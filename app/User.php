<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function answers()
    {
        return $this->hasMany(Answers::class, 'user_id');
    }

    public function questions()
    {
        return $this->hasMany(Questions::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'owner_id');
    }

    public function items_requests()
    {
        return $this->hasMany(ItemRequests::class, 'user_id');
    }

    public function corporate()
    {
        return $this->belongsToMany(Corporate::class, 'corporate_users', 'user_id', 'corporate_id');
    }
}
