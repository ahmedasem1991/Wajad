<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Settings extends Model
{
    use LogsActivity, HasTranslations;

    protected $fillable = [
        'key', 'value', 'image', 'title'
    ];

    /**
     * Define Translateable Fields
     *
     * @var array
     */
    public $translatable = ['title', 'value'];

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

    public static function find($key)
    {
        return self::where('key', $key)->first()->value ?? 'Not Found';
    }
}
