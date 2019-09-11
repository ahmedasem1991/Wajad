<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity, HasTranslations;

    /**
     * Define Translateable Fields
     *
     * @var array
     */
    public $translatable = ['title'];

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

    /**
     * Get Category Based On Application Language
     *
     * @param object $value
     * @return void
     */
    public function getTitleAttribute($value)
    {
        return json_decode($value, TRUE)[app()->getLocale()];
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
}
