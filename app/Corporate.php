<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'corporate_users', 'corporate_id', 'user_id');
    }
}
