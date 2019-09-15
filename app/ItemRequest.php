<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ItemRequest extends Model
{
    use LogsActivity;
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function requested_user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
