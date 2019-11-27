<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignQrcode extends Model
{
   protected $table='assign_qrcodes';
   protected $fillable =['assign_reference_number','type','quantity','assign_to','user_id','corporate_id','available_period','created_from'];
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
    
   public function qrcodes()
   {
       return $this->hasMany('App\Qrcode', 'assign_reference_number', 'assign_reference_number');
   }
   
   public function user()
   {
       return $this->belongsTo(User::class,'user_id');
   }

   public function corporateuser()
   {
       return $this->belongsTo(User::class,'user_id')->where('corporate_id',auth()->user()->id)->where('type','1');
   }
   public function corporate()
   {
       return $this->belongsTo(Corporate::class,'corporate_id');
   }
}
