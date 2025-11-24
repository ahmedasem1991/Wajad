<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Banner extends Model implements Sortable
{
    use LogsActivity, SoftDeletes, SortableTrait;

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected static $logAttributes = [
        'type',
        'order',
        'url',
        'post.title',
        'user.name',
        'image',
        'start_date',
        'end_date',
        'clicks',
    ];

    protected static $logOnlyDirty = true;

    public function visits()
    {
        return $this->morphOne(Visit::class, 'visitable');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeAvailable($query)
    {
        return $query->where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now());
    }

    public function notStarted()
    {
        return ($this->start_date > Carbon::now()) ? true : false;
    }

    public function ended()
    {
        return ($this->end_date < Carbon::now()) ? true : false;
    }
}
