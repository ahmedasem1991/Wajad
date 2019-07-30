<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Banners extends Model
{
    public function type()
    {
        return $this->belongsTo(BannerTypes::class);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = Str::slug($value);
    }
}
