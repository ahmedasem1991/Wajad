<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostReport extends Model
{
    use SoftDeletes;
  protected $table = "posts_reports";
  protected $fillable = ['post_id', 'user_id', 'details', 'image'];

  public function post()
  {
    return $this->belongsTo(Post::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
