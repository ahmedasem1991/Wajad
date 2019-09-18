<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class City extends Model
{
    use LogsActivity;
    /**
     * Get the region that owns the governorate.
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
