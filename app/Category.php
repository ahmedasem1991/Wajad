<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;

    /**
     * Define Image Path For Categories
     *
     * @var string
     */
    protected $images_path = "/images/categories/images/";

    /**
     * Define Icon Path For Categories
     *
     * @var string
     */
    protected $icons_path = "/images/categories/icons/";

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
