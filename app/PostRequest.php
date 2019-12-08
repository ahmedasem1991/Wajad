<?php

namespace App;

use App\Nova\Post;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PostRequest extends Model
{
    use LogsActivity;
    protected $fillable = ['user_id', 'post_id', 'is_request_valid'];

    public function post()
    {
        return $this->belongsTo(Post::class);
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
