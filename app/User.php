<?php

namespace App;


use App\Answer;
use App\Question;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Pktharindu\NovaPermissions\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use Notifiable, LogsActivity,  HasRoles, SoftDeletes;

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
        'corporate_id',
        'posts_number',
        'image',
        'social_name',
        'is_social_user',
        'social_id',
    ];

    protected static $logAttributes = [
        'name',
        'email',
        'type',
        'status',
        'mobile_number',
        'country.name_en',
        'is_mobile_number_verified',
        'email_verified_at',
        'default_distance_unit',
        'receive_emails',
        'receive_push_notifications',
        'remember_token',
        'corporate.name_en',
        'posts_number',
        'image',
        'social_name',
        'is_social_user',
        'social_id',
    ];
    protected static $logOnlyDirty = true;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const Types = [
        1 => 'user',
        2 => 'corporate', // corporate admin
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

    const DEFAULT_PHOTO = 'images/profile/default-profile.png';
    // public function status($status)
    // {
    //     return $this->type === self::Types[$status];
    // }


    public function getNameAttribute()
    {
        $URL = \URL::current();
        logger( $URL);

        if ((strstr($URL, 'all-posts') || strstr($URL, 'notifications')|| strstr($URL, 'banners') ) && strstr($URL, 'creation-fields')) {
            return "{$this->email} - {$this->mobile_number} -  (" . $this->attributes['name'].")";
        } 

        $check='';
        if($this->attributes['name'])
        $check=$this->attributes['name'];
        if($this->name)
        $check=$this->name;


      return   $check;
      
    }
    public function firstTimeLogin()
    {
        return $this->first_time_login === 1;
    }


    public function isActive()
    {
        return $this->status === self::Status['Active'];
    }

    public function isNotActive()
    {
        return $this->status === self::Status['Not Active'];
    }

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

    public function adminFirstLogin()
    {
        return $this->isAdmin() && $this->firstTimeLogin();
    }

    public function corporateAdminFirstLogin()
    {
        return $this->isCorporateAdmin() && $this->firstTimeLogin();
    }
    // public function isCorporateUser()
    // {
    //     return $this->type === self::Types['corporate user'];
    // }

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

    public function posts_requests()
    {
        return $this->hasMany(PostRequest::class);
        // return $this->hasMany(ItemRequest::class, 'user_id');
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
        return 'users.' . $this->id;
        //  return 'nova-notifications';
    }

    public function exceededPostLimitation()
    {
       return $this->posts_number > defaultGroup()->limitation_of_posts;
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

    public function userDevices()
    {
        return $this->hasMany(DeviceType::class, 'user_id');
    }

    public function activeLogin()
    {
        return $this->hasMany(ActiveLogin::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'mobile_country_id')->withTrashed();
    }
    public function devices()
    {
        return $this->hasMany(\App\FcmUser::class);
    }
    public function setLanguage($language)
    {
       $this->language=$language;
       $this->save();
    }
    public function getLanguage()
    {
      return  $this->language;

    }
}
