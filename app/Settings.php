<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Settings extends Model
{
    use LogsActivity;
    
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
