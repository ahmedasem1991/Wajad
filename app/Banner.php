<?php

namespace App;

use App\Item;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Banner extends Model
{
    use LogsActivity;
    protected $fillable = [
        'type', 'image', 'url', 'item_id'
    ];
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
