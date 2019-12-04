<?php

namespace App;

use App\Brand;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;

    protected $fillable=['name_en','name_ar','description_en','description_ar','image'];

    public function scopeCategory($query, $category_id)
    {
        return $query->where('id', $category_id) ?? null;
    }

    public function scopeSubcategories($query, $sub_category_id)
    {
        return $query->where('sub_category_id', $sub_category_id);
    }
    public function scopeName($query, $name)
    {
        return $query->where('name_ar', $name)->orWhere('name_en',$name) ?? null;
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function alldata()
    {
        return $this->hasMany(SubCategory::class)
        ->with('brands.models.items');
    }




}
