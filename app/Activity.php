<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
  protected  $table = 'activity_log';

  public function user()
  {
    return $this->belongsTo(User::class, 'causer_id');
  }
}
