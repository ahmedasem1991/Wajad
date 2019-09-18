<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class PostType extends Model
{
   use  LogsActivity;
  protected $fillable=['title','description'];
}
