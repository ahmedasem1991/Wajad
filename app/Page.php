<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use LogsActivity;

    protected $fillable = [
        'key',
        'title_en',
        'body_en',
        'title_ar',
        'body_ar',
    ];
}
