<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Banners extends Model
{
    use LogsActivity;
    
    public function BannerTypes()
    {
        return $this->belongsTo(BannerTypes::class, 'type_id');
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = Str::slug($value);
    }
}
