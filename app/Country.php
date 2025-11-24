<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Country extends Model
{
    use LogsActivity;
    use SoftDeletes;

    protected static $logAttributes = [
        'name_en',
        'name_ar',
        'iso_code',
        'country_code',
    ];

    protected static $logOnlyDirty = true;

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
