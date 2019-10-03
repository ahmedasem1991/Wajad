<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class GenerateQrcode extends Model
{
   use LogsActivity;

    protected $fillable =['reference_number','type','quantity'];
    protected $table='generate_qrcodes';


    const Types = [
        1 => 'Single Assign',
        2 => 'Multi Assign',
        'Single Assign' => 1,
        'Multi Assign' => 2
    ];

    public function typeTitle($type)
    {
        return $this->type === self::Types[$type];
    }

    const Status = [
        1 => 'In Stock',
        2 => 'Assigned To User',
        3 => 'Assigned To Corporate',
        4 => 'Registered',
        5 => 'Re-Registered',
        'Not Active' => 1,
        'Assigned To User' => 2,
        'Assigned To Corporate' => 3,
        'Registered' => 4,
        'Re-Registered' => 5,
    ];
        public function status($status)
    {
        return $this->status === self::Status[$status];
    }

     public function qrcodes()
    {
        return $this->hasMany('App\Qrcode', 'reference_number', 'reference_number');
    }


   

   
 
}
