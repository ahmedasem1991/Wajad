<?php

namespace App;

use App\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Banner extends Model
{
    use LogsActivity, SoftDeletes;

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function scopeAvailable($query)
    {
        return $query->where('start_date', '<=', Carbon::now())
            ->where('end_date','>=', Carbon::now());
    }
}
