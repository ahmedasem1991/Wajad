<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use LogsActivity, SoftDeletes;

    protected $fillable = [
        'key',
        'title_en',
        'body_en',
        'title_ar',
        'body_ar',
    ];

    protected static $logAttributes = [
        'key',
        'title_en',
        'body_en',
        'title_ar',
        'body_ar',
    ];

    protected static $logOnlyDirty = true;
}
