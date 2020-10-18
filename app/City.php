<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class City extends Model
{
    use LogsActivity, SoftDeletes;

    protected $fillable = [
        'id', 'name_en', 'name_ar',
    ];

    protected static $logAttributes = [
        'name_en', 'name_ar',
    ];
    protected static $logOnlyDirty = true;
    /**
     * Get the region that owns the governorate.
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }
}
