<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ItemRequests extends Model
{
    use LogsActivity;
    
    public function item()
    {
        return $this->belongsTo('Item', 'item_id');
    }

    public function requested_user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function answers()
    {
        return $this->hasMany('Answers', 'request_id');
    }
}
