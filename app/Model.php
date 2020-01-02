<?php

namespace App;

use App\Brand;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Model extends MasterModel
{
    use LogsActivity;

    protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar', 'image', 'brand_id'];


    /**
     * Define Items Relation With Each Category
     *
     * @return object
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function scopeName($query, $name)
    {
        return $query->where('name_ar', $name)->orWhere('name_en', $name) ?? null;
    }
}
