<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorporateAssignQrcode extends Model
{
   protected $table='corporate_assign_qrcodes';
   protected $fillable =['corporate_assign_reference_number','type','quantity','user_id','corporate_id','created_by'];
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
       return $this->hasMany('App\Qrcode', 'corporate_assign_reference_number', 'corporate_assign_reference_number');
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
