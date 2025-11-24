<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class PostType extends Model
{
    use LogsActivity, SoftDeletes;

    protected $fillable = ['title', 'description'];

    protected static $logAttributes = [
        'title', 'description',
    ];

    protected static $logOnlyDirty = true;
}
