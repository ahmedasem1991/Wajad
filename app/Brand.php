<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\Helpers\Traits\ModelObserveImage;
use Illuminate\Database\Eloquent\Model as ModelMaster;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Brand extends ModelMaster
{
    use HasFactory;

    use LogsActivity, ModelObserveImage, SoftDeletes;

    protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar', 'image', 'sub_category_id'];

    protected static $logAttributes = [
        'name_en', 'name_ar', 'description_en', 'description_ar', 'image',
    ];

    protected static $logOnlyDirty = true;

    //   public function getNameEnAttribute($value)
    // {
    //     //return "{$this->name_en} - {$this->subcategory->name_en}";
    //     return $value . ' ( '.$this->subcategory->name_en . ' )';
    // }
    // public function getPeriodAttribute($value)
    // {
    //     return $value . ' Day/s';
    // }
    public function subcategories()
    {
        return $this->belongsToMany(SubCategory::class, 'brand_sub_category', 'brand_id', 'sub_category_id');
    }

    public function models()
    {
        return $this->hasMany(Model::class);
    }

    public function scopeName($query, $name)
    {
        return $query->where('name_ar', $name)->orWhere('name_en', $name) ?? null;
    }

    public function scopeSubcategories($query, $sub_category_id)
    {
        return $query->where('sub_category_id', $sub_category_id);
    }
}
