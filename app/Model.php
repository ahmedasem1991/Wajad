<?php

namespace App;

use App\Services\Helpers\Traits\ModelObserveImage;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Model extends MasterModel
{
    use LogsActivity, ModelObserveImage, SoftDeletes;

    protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar', 'image', 'brand_id'];

    protected static $logAttributes = [
        'name_en', 'name_ar', 'description_en', 'description_ar', 'image', 'brand.name_en',
    ];

    protected static $logOnlyDirty = true;

    /**
     * Define Items Relation With Each Category
     *
     * @return object
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    // public function colors()
    // {
    //     return $this->hasMany(Color::class);
    // }

    public function scopeName($query, $name)
    {
        return $query->where('name_ar', $name)->orWhere('name_en', $name) ?? null;
    }
}
