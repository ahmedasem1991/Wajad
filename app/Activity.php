<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
  protected  $table = 'activity_log';
  protected $casts = ['properties' => 'array'];

  public function user()
  {
    return $this->belongsTo(User::class, 'causer_id');
  }
}
