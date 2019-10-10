<?php

namespace App;

use App\Brand;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Model extends MasterModel
{
    use LogsActivity;

    protected $fillable=['name_en','name_ar','description_en','description_ar','image','brand_id'];
    

    /**
     * Define Items Relation With Each Category
     *
     * @return object
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // public function colors()
    // {
    //     return $this->hasMany(Color::class);
    // }

 

    /**
     * Scope For Single Category
     *
     * @param object $query
     * @param integer $category_id
     * @return object
     */
    // public function scopeBrand($query, $brand_id)
    // {
    //     return $query->where('id', $brand_id) ?? null;
    // }



 
    // public function brands($query, $brand_id)
    // {
    //     return $query->where('brand_id', $brand_id);
    // }
}
