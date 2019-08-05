<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function qrcode()
    {
        return $this->belongsTo(Qrcodes::class, 'item_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ItemImages::class);
    }

    public function item_requests()
    {
        return $this->hasMany(ItemRequests::class);
    }

    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
