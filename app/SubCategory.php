<?php

namespace App;

use App\Brand;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class SubCategory extends Model
{
    use LogsActivity;

    protected $fillable=['name_en','name_ar','description_en','description_ar','image','category_id'];
    protected $table="sub_categories";

    public function scopeCategory($query, $category_id)
    {
        return $query->where('category_id', $category_id) ?? null;
    }
    public function scopeSubcategory($query, $sub_category_id)
    {
        return $query->where('id', $sub_category_id) ?? null;
    }
    public function scopeName($query, $name)
    {
        return $query->where('name_ar', $name)->orWhere('name_en',$name) ?? null;
    }
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
    public function posts()
    {
        return  $this->hasMany(Post::class,'sub_category_id') ;
    }

    public function lostposts()
    {
        return  $this->hasMany(Post::class,'sub_category_id')->where('status',0) ;
    }
    public function foundposts()
    {
        return  $this->hasMany(Post::class,'sub_category_id')->where('status',1) ;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brandsData()
    {
    return $this->hasMany(Brand::class)
        ->with('models.items');
    }


}
