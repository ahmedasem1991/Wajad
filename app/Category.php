<?php

namespace App;

use App\Brand;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;

    /**
     * Define Image Path For Categories
     *
     * @var string
     */
    protected $images_path = "/images/categories/";

    /**
     * Define Icon Path For Categories
     *
     * @var string
     */
    protected $icons_path = "/images/categories/";

    /**
     * Define Items Relation With Each Category
     *
     * @return object
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getDefaultImageAttribute($value)
    {
        if ($value == 'default-image.jpg') {
            return $this->images_path . $value;
        }
        return $value;
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

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function scopeBrands($query, $brand_id)
    {
        return $query->where('brand_id', $brand_id);
    }
}
