<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Support extends Model
{
    use LogsActivity;
    protected $fillable = ['name','phone','email','message'];
}
