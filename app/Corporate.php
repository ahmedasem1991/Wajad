<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Corporate extends Model
{
    use HasFactory;
    use LogsActivity, SoftDeletes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'mobile_number',
        'details_en',
        'details_ar',
        'address_en',
        'address_ar',
        'latitude',
        'longitude',
        'status',
        'image',
        'location',
        'unique_id',
        'end_date',
    ];

    protected static $logAttributes = [
        'name_en',
        'name_ar',
        'mobile_number',
        'details_en',
        'details_ar',
        'address_en',
        'address_ar',
        'latitude',
        'longitude',
        'status',
        'image',
        'location',
        'unique_id',
        'end_date',
    ];

    protected static $logOnlyDirty = true;

    protected $casts = [
        'end_date' => 'datetime',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'corporate_users', 'corporate_id', 'user_id');
    // }
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function qrcodes()
    {
        return $this->hasMany(Qrcode::class);
    }

    public function admins()
    {
        return $this->hasMany(User::class);
    }

    public function isActive()
    {
        return ($this->status == 1) ? true : false;
    }

    public function isNotActive()
    {
        return ($this->status == 0) ? true : false;
    }

    public function ended()
    {
        return ($this->end_date < Carbon::now()) ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'mobile_country_id')->withTrashed();
    }
}
