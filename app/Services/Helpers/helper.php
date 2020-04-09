<?php

use App\Role;

function defaultGroup()
{
    if (Auth('api')->check()) {
        if (count(Auth('api')->User()->roles) > 0)
            return Auth('api')->User()->roles()->latest('id')->first();
        else
            return Role::where('default_group', 1)->first();
    }
    return Role::where('default_group', 1)->first();
}


