<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    use SoftDeletes;

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
