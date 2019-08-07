<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BannerTypes extends Model
{
    use LogsActivity;

    public function Banners()
    {
        return $this->hasMany(Banners::class, 'type_id');
    }
}
