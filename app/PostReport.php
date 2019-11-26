<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostReport extends Model
{
  protected $table = "posts_reports";
  protected $fillable = ['post_id', 'user_id', 'details', 'image'];

  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}
