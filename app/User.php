<?php

namespace App;


use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject 
{
    use Notifiable, LogsActivity;

    protected $fillable = [
        'name', 'email', 'password', 'type', 'status', 'mobile_number', 'mobile_country_id'
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

    const Status = [
        0 => 'Not Active',
        1 => 'Active',
        'Not Active' => 0,
        'Active' => 1,
    ];

    // public function status($status)
    // {
    //     return $this->type === self::Types[$status];
    // }

    public function isAdmin()
    {
        return $this->type === self::Types['admin'];
    }

    public function is_corporate()
    {
        return $this->type === self::Types['corporate'];
    }

    public function isUser()
    {
        return $this->type === self::Types['user'];
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
    public function posts()
    {
        return $this->hasMany(Post::class,'publisher_id');   
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
        return $this->hasMany(Qrcode::class, 'user_id');
    }

    public function corporate()
    {
        return $this->belongsToMany(Corporate::class, 'corporate_users', 'user_id', 'corporate_id');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
