<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Country extends Model
{
    use LogsActivity;
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
