<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemRequests extends Model
{
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
