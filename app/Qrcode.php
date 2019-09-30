<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Qrcode extends Model
{
use LogsActivity;
    protected $fillable =['reference_number','assign_reference_number','type','status','quantity','qrcode_url','image','available_period','start_at','end_at','user_id','corporate_id'];



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

    public function scopeType($query,$type)
    {
       return $query->where('type', self::Types[$type]);
    }

    const STATUS = [
        1 => 'In Stock',
        2 => 'Assigned To User',
        3 => 'Assigned To Corporate',
        4 => 'Registered',
        5 => 'Re-Registered',
        'In Stock' => 1,
        'Assigned To User' => 2,
        'Assigned To Corporate' => 3,
        'Registered' => 4,
        'Re-Registered' => 5,
    ];
        public function statusTitle($status)
    {
        return $this->status = self::STATUS[$status];
    }


    public function productPackagePivot()
    {
        return $this->belongsTo(PackageProductManagement::class, 'package_product_pivot_id');
    }

    public function getQrcodeUrlAttribute($value)
    {
        return route('api.scan-qrcode-api', $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);   
    }

    public function qrcodegenerate()
    {
        return $this->belongsTo(GenerateQrcode::class,'reference_number','reference_number');   
    }
    public function assignqrcode()
    {
        return $this->belongsTo(AssignQrcode::class,'assign_reference_number','assign_reference_number');   
    }

    public function package_product_pivot()
    {
        return $this->belongsTo(PackageProductManagement::class, 'package_product_pivot_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
