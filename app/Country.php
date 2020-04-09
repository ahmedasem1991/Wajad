<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Country extends Model
{
    use SoftDeletes;
    use LogsActivity;
    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
