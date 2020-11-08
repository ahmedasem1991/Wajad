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

    protected static $logAttributes = [
        'body'
    ];
    protected static $logOnlyDirty = true;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
