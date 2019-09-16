<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
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
