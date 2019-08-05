<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{ 
    use LogsActivity;

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
