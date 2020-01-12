<?php

use App\Role;
  
  function defaultGroup(){
    return Role::where('default_group',1)->first();
     
  }