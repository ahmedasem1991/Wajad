<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'package_user';

    protected $fillable = [
        'end_date'
    ];

    protected $casts = [
        'start_date' => 'date', 
        'end_date' => 'date' 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
