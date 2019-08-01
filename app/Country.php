<?php

namespace App;

 
use Illuminate\Database\Eloquent\Model;
 

class Country extends Model
{

 protected $table="countries";

 
 public function regions()
 {
     return $this->hasMany('App\Region', 'country_id', 'id');
 }
 

}
