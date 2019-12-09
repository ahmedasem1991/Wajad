<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class DeviceType extends Model
{
    use LogsActivity;

    protected $fillable=['user_id','device_type'];
    protected $table='devices_types';
 
 
 

 
}
