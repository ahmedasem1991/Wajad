<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrcodeLog extends Model
{
    protected $table = 'qrcode_log';

    protected $fillable = ['ip', 'location', 'lat', 'lng', 'device_type'];

    public function qrcode()
    {
        return $this->belongsTo(Qrcode::class);
    }
}
