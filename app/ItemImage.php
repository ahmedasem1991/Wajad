<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class ItemImage extends Model
{
    use LogsActivity,SoftDeletes;

    protected $fillable = ['item_id', 'image'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
