<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;
    
    protected $images_path = "/images/categories/images/";
    protected $icons_path = "/images/categories/icons/";


    protected $hidden = [];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function itemsCount(){
        return $this->items()->count();
    }
    public function getIconAttribute($value)
    {
        return $this->icons_path . $value;
    }

    public function getDefaultImageAttribute($value)
    {
        return $this->images_path . $value;
    }
}
