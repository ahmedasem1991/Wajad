<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Region extends Model
{
    use LogsActivity,SoftDeletes;
    /**
     * Get the Cities for the region.
     */
    public function Cities()
    {
        return $this->hasMany(City::class, 'region_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
