<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\Helpers\Traits\ModelObserveImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class SubCategory extends Model
{
    use HasFactory;

    use LogsActivity, ModelObserveImage, SoftDeletes;

    protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar', 'image', 'category_id'];

    protected $table = 'sub_categories';

    protected static $logAttributes = [
        'name_en', 'name_ar', 'description_en', 'description_ar', 'image', 'category.name_en',
    ];

    protected static $logOnlyDirty = true;

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
        return $query->where('name_ar', $name)->orWhere('name_en', $name) ?? null;
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_sub_category', 'sub_category_id', 'brand_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'sub_category_id');
    }

    public function lostposts()
    {
        return $this->hasMany(Post::class, 'sub_category_id')->where('status', 0);
    }

    public function foundposts()
    {
        return $this->hasMany(Post::class, 'sub_category_id')->where('status', 1);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brandsData()
    {
        return $this->hasMany(Brand::class)
            ->with('models.items');
    }
}
