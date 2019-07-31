<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerTypes extends Model
{
    public function Banners()
    {
        return $this->hasMany(Banners::class, 'type_id');
    }
}
