<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class WajadOffice extends Model
{
    use LogsActivity,SoftDeletes;

    protected static $logAttributes = [
        'name_en',
        'name_ar',
        'details_en',
        'details_ar',
        'address_en',
        'address_ar',
        'location',
        'latitude',
        'longitude',
        'status',
        'image',
    ];
    protected static $logOnlyDirty = true;

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
