<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ItemImages extends Model 
{
    use LogsActivity;
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}