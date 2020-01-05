<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class WajadOffice extends Model
{
    use LogsActivity,SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
