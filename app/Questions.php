<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Questions extends Model
{
    use SoftDeletes, LogsActivity;

    public function user()
    {
        return $this->belongsTo(User::class, 'founder_id');
    }

    public function answer()
    {
        return $this->hasMany(Answers::class, 'question_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
