<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class PostRequest extends Model
{
    use LogsActivity, SoftDeletes;

    protected $casts = [
        'rejected_at' => 'datetime',

    ];

    protected $fillable = ['user_id', 'post_id', 'is_request_valid', 'rejected_at', 'comment'];

    protected static $logAttributes = [
        'post.title', 'is_request_valid', 'rejected_at', 'comment',
    ];

    protected static $logOnlyDirty = true;

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id')->withTrashed();
    }

    public function postRequestUser()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function postRequestUserAnswers()
    {
        return $this->postRequestUser
            ->answers->where('user_id', $this->user_id);
        // return $this->post->questions->where('')
        // hasMany(Answer::class, 'user_id');
    }

    public function answers()
    {
        logger(session()->get('user_id'));

        return $this->hasMany(Answer::class, 'post_request_id')->where('user_id', session()->get('user_id'));
    }
    // public function Answersbysession()
    // {

    //     return $this->hasMany(Answer::class, 'post_request_id')->where('user_id',session()->get('user_id'));
    // }
}
