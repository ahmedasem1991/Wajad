<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corporate extends Model
{
    use LogsActivity, SoftDeletes;

    protected $fillable = [
        'name_en',
        'name_ar',
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
        'end_date'
    ];

    protected $casts = [
        'end_date'   => 'datetime'
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'corporate_users', 'corporate_id', 'user_id');
    // }
    public function users()
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
}
