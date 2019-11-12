<?php

namespace App;

use App\Model;
use App\Item;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Color extends MasterModel
{
    use LogsActivity;

    protected $fillable=['name_en','name_ar','icon'];
 
 
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function scopeColor($query, $color_id)
    {
        return $query->where('id', $color_id) ?? null;
    }
    public function scopeName($query, $name)
    {
        return $query->where('name_ar', $name)->orWhere('name_en',$name) ?? null;
    }

 
}
