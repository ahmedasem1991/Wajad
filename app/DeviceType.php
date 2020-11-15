<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class DeviceType extends Model
{
    //use LogsActivity,SoftDeletes;
    use SoftDeletes;

    protected $fillable = ['user_id', 'device_type'];
    protected $table = 'devices_types';
    protected static $logAttributes = [
        'device_type'
    ];
    protected static $logOnlyDirty = true;
}
