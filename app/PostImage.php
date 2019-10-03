<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class PostImage extends Model
{
    use LogsActivity;

   protected $fillable = ['post_id', 'image'];

   public function post()
   {
       return $this->belongsTo(Post::class);   
   }
}
