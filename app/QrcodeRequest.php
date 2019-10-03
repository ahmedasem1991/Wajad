<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrcodeRequest extends Model
{
    protected $table='qrcode_requests'; 
    protected $fillable=['number'];
    const Status = [
        0 => 'Pending',
        1 => 'Generated',
        'Pending' => 0,
        'Generated' => 1,
    ];

    public function status($status)
    {
        return $this->status === self::Status[$status];
    }
    public function corporateAdmin()
    {
        return $this->belongsTo(User::class,'corporate_admin_id');   
    }
    public function corporate()
    {
        return $this->belongsTo(Corporate::class);   
    }
}
