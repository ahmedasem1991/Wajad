<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Region extends Model
{
    use LogsActivity;
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
