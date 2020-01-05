<?php

use App\Role;
  
  function defaultGroup(){
    if(count(Auth()->User()->roles)>0)
   return Auth()->User()->roles()->latest('id')->first();
    else
    return Role::where('default_group',1)->first();
     
  }