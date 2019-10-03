<?php

namespace App;

use App\Brand;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;

    protected $fillable=['name_en','name_ar','description_en','description_ar','image'];
 
    /**
     * Define Items Relation With Each Category
     *
     * @return object
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
 

    public function getIconAttribute($value)
    {
        if ($value == "default-icon.png") {
            return $this->icons_path . $value;
        }
        return $value;
    }

    /**
     * Scope For Single Category
     *
     * @param object $query
     * @param integer $category_id
     * @return object
     */
    public function scopeCategory($query, $category_id)
    {
        return $query->where('id', $category_id) ?? null;
    }
    public function scopeBrands($query, $brand_id)
    {
        return $query->where('brand_id', $brand_id);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function scopeSubcategories($query, $sub_category_id)
    {
        return $query->where('sub_category_id', $sub_category_id);
    }


}
