<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{

    /**
     * Get the region that owns the governorate.
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}
