<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Support extends Model
{
    use LogsActivity,SoftDeletes;
    protected $fillable = ['name','phone','email','message'];
}
