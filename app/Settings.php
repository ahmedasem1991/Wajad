<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Settings extends Model
{
    protected $fillable = [
        'key', 'value'
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
