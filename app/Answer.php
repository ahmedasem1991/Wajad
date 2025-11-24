<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Answer extends Model
{
    use LogsActivity, SoftDeletes;

    protected $fillable = ['user_id', 'answers', 'question_id', 'post_request_id'];

    protected static $logAttributes = [
        'user.name', 'answers', 'question.question', 'post_request_id',
    ];

    protected static $logOnlyDirty = true;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post_request()
    {
        return $this->belongsTo(PostRequest::class, 'post_request_id');
    }
}
