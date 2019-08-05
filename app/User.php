<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasRoles, Notifiable, LogsActivity;

    protected $fillable = [
        'name', 'email', 'password', 'type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const Types = [
        1 => 'user',
        2 => 'corporate',
        3 => 'admin',
        'user' => 1,
        'corporate' => 2,
        'admin' => 3
    ];

    public function is_admin()
    {
        return (bool) $this->type === self::Types['admin'];
    }

    public function is_corporate()
    {
        return (bool) $this->type === self::Type['corporate'];
    }

    public function scopeCorporates($query)
    {
        return $query->where('type', self::Types['corporate']);
    }

    # Relations Starts
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

    public function activities()
    {
        return $this->hasMany(Activity::class, 'causer_id');
    }

    public function items_requests()
    {
        return $this->hasMany(ItemRequests::class, 'user_id');
    }

    public function qrcodes()
    {
        return $this->hasMany(Qrcodes::class, 'user_id');
    }


    public function corporate()
    {
        return $this->belongsToMany(Corporate::class, 'corporate_users', 'user_id', 'corporate_id');
    }
}
