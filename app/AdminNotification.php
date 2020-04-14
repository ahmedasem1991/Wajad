<?php

namespace App;

 
use Illuminate\Database\Eloquent\Model as MasterModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class AdminNotification extends MasterModel
{
    use LogsActivity, SoftDeletes;
    
    protected $table='admin_notifications';
    protected $fillable=['body'];

 
}
