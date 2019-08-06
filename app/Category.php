<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{ 
    use LogsActivity;


    protected $hidden = [];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function itemsCount(){
        return $this->items()->count();
    }
}
