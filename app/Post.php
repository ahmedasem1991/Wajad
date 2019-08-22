<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends Model
{
    use LogsActivity;

    protected $fillable = ['title', 'decription'];
    protected static $logAttributes = ['title', 'decription'];
    protected $casts = [
        'losted_at' => 'datetime',
        'founded_at' => 'datetime'
    ];

    const Status = [
        0 => 'lost',
        1 => 'found',
        'lost' => 0,
        'found' => 1
    ];

    public function is_lost()
    {
        return $this->status === self::Status['lost'];
    }
    public function is_found()
    {
        return $this->status === self::Status['found'];
    }
    
   
    public function scopePublisher($query, $publisher_id)
    {
        return $query->where('publisher_id', $publisher_id);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);   
    }
    public function publisher()
    {
        return $this->belongsTo(User::class,'publisher_id');   
    }
    public function images()
    {
        return $this->hasMany(PostImages::class);   
    }
}
