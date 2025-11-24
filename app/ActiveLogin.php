<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Spatie\Activitylog\Traits\LogsActivity;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ActiveLogin extends Model
{
    protected $table = 'active_login';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
