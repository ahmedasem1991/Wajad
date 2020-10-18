<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use LogsActivity,SoftDeletes;

    protected $fillable = [
        'key', 'value', 'image', 'title'
    ];

    protected static $logAttributes = [
        'key', 'value', 'image', 'title'
    ];
    protected static $logOnlyDirty = true;

    protected $casts = [
        'title' => 'array',
        'value' => 'array'
    ];

    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = Str::slug($value);
    }

    public function getKeyAttribute($value)
    {
        return Str::title($value);
    }
}
