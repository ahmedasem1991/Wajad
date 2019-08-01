<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Corporate extends Model
{
    use HasTranslations, LogsActivity;

    public $translatable = ['name', 'details', 'address'];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'corporate_users', 'corporate_id', 'user_id');
    }
}
