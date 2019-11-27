<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'package_user';

    protected $fillable = [
        'user_id','package_id','corporate_id'
    ];

 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function corporate()
    {
        return $this->belongsTo(Corporate::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
