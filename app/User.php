<?php

namespace App;


use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Pktharindu\NovaPermissions\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use Notifiable, LogsActivity,  HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status',
        'mobile_number',
        'mobile_country_id',
        'is_mobile_number_verified',
        'email_verified_at',
        'default_distance_unit',
        'receive_emails',
        'receive_push_notifications',
        'remember_token',
        'corporate_id'
         
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


    public function isCorporateAdmin()
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
    public function scopeNormalusers($query)
    {
        return $query->where('type', self::Types['user']);
    }

    # Relations Starts
    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'publisher_id');
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
        return $this->hasMany(ItemRequest::class, 'user_id');
    }

    public function qrcodes()
    {
        return $this->hasMany(Qrcode::class, 'user_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class)->withPivot('starts_date');
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }

    public function corporate()
    {
        return $this->belongsTo(Corporate::class);
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

    /*
    * Define The Corporate  Of Post
    */
    public function scopeCorporate($query, $corporate_id)
    {
        return $query->where('corporate_id', $corporate_id);
    }
    public function scopeNotSuperAdmin($query, $user_id = 3)
    {
        return $query->where('type', '!=', $user_id);
    }
    public function scopeSuperAdmin($query, $user_id = 3)
    {
        return $query->where('type', $user_id);
    }
    public function scopeCorporateAdmin($query, $user_id = 2)
    {
        return $query->where('type', '=', $user_id);
    }


    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        //  return 'users.' . $this->id;
        return 'nova-notifications';
    }

    public function postLimitation()
    {
        //return $this->hasOne(PostLimitation::class, 'user_id');
        $this->posts_limitation;
    }

    public function exceededPostLimitation()
    {
        // return $this->posts()->count() > $this->postLimitation->posts_limitation;
        return $this->posts()->count() > $this->postLimitation;
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->mobile_number;
    }

    public function userVerification()
    {
        return $this->hasOne(UserVerifications::class, 'user_id');
    }

    public function isEmailVerified()
    {
        return (bool) $this->email_verified_at;
    }
}
