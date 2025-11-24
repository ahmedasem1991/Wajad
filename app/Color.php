<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Color extends MasterModel
{
    use HasFactory;

    use LogsActivity, SoftDeletes;

    protected $fillable = ['name_en', 'name_ar', 'icon'];

    protected static $logAttributes = [
        'name_en', 'name_ar', 'icon',
    ];

    protected static $logOnlyDirty = true;

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function scopeColor($query, $color_id)
    {
        return $query->where('id', $color_id) ?? null;
    }

    public function scopeName($query, $name)
    {
        return $query->where('name_ar', $name)->orWhere('name_en', $name) ?? null;
    }
}
