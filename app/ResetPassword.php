<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResetPassword extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
