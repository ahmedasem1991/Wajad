<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class City extends Model
{
    use LogsActivity;

    protected $fillable = [
        'id', 'name_en', 'name_ar',
    ];
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
