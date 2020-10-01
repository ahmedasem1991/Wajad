<?php

use App\Role;
use App\Setting;

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

function maxReportsNumber()
{
    return Setting::where('key', 'max_post-reports-number')->first()['value'];
}


function MinQRCodesNumber()
{
    return Setting::where('key', 'min-qrcodes-number')->first()['value'];
}