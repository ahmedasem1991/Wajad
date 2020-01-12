<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use LogsActivity, SoftDeletes;

   protected $table="people";
   protected $fillable=['name','email','mobile_number','address','type','corporate_id'];
   
   public function corporate()
   {
       return $this->belongsTo(Corporate::class);
   }
}
