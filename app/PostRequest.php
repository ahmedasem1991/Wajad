<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PostRequest extends Model
{
    use LogsActivity;

    protected $fillable = ['user_id', 'post_id', 'is_request_valid'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function postRequestUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function answers()
    // {
    //     return $this->hasMany(Answer::class);
    // }
}
