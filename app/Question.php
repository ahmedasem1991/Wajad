<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Question extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = ['post_id', 'question', 'founder_id', 'corporate_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'founder_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    
    public function Uanswers()
    {
        return $this->hasMany(Answer::class)->select('answers');
    }

    public function Post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
