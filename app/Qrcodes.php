<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qrcodes extends Model
{
   // use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

 

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}
