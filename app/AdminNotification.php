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
    protected $fillable=['body','send_to','users','search_user','send_by'];

    protected static $logAttributes = [
        'body'
    ];

    protected $casts = [
        'send_by' => 'array',
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
