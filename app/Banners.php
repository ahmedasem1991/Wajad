<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Banners extends Model
{
    public function BannerTypes()
    {
        return $this->belongsTo(BannerTypes::class, 'type_id');
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = Str::slug($value);
    }
}
