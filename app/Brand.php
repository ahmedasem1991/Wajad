<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected  $fillable=['name_en','name_ar','description_en','description_ar','image','category_id'];

  public function category()
  {
   return  $this->belongsTo(Category::class);
  }

 

  public function scopeCategory($query, $category_id)
  {
      return $query->where('category_id', $category_id);
  }

  // public function scope($query, $category_id)
  // {
  //     return $query->where('category_id', $category_id);
  // }
  
}
