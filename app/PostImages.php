<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
   protected $table="post_images";

   public function post()
   {
       return $this->belongsTo(Post::class);   
   }
}
