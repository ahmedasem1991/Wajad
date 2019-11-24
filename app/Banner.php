<?php

namespace App;

use App\Item;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Banner extends Model
{
    use LogsActivity;

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
