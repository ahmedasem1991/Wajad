<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Corporate extends Model
{
    use LogsActivity,SoftDeletes;
    protected $fillable=['name_en','name_ar','details_en','details_ar','address_en','address_ar','latitude','longitude','status','image','location','unique_id'];
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'corporate_users', 'corporate_id', 'user_id');
    // }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
