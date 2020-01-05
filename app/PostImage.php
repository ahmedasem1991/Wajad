<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class PostImage extends Model
{
    use LogsActivity,SoftDeletes;

   protected $fillable = ['post_id', 'image'];

   public function post()
   {
       return $this->belongsTo(Post::class);
   }
}
