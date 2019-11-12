<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\Model as ModelMaster;
use Spatie\Activitylog\Traits\LogsActivity;

class Brand extends ModelMaster
{
  use LogsActivity;
  protected  $fillable=['name_en','name_ar','description_en','description_ar','image','sub_category_id'];

  public function subcategory()
  {
   return  $this->belongsTo(SubCategory::class,'sub_category_id');
  }

  public function models()
  {
      return $this->hasMany(Model::class);
  }

  public function scopeName($query, $name)
  {
      return $query->where('name_ar', $name)->orWhere('name_en',$name) ?? null;
  }
  
  public function scopeSubcategory($query, $sub_category_id)
  {
      return $query->where('sub_category_id', $sub_category_id);
  }

 
  
}
