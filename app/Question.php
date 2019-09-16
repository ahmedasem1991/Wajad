<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Question extends Model
{
    use SoftDeletes, LogsActivity;

    public function user()
    {
        return $this->belongsTo(User::class, 'founder_id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
