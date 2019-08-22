<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    /**
     * Get the Cities for the region.
     */
    public function Cities()
    {
        return $this->hasMany('App\Cities', 'region_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
