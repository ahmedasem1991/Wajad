<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ItemImage extends Model 
{
    use LogsActivity;

    protected $fillable = ['item_id', 'image'];
 
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}