<?php

namespace App;

use App\Item;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Banner extends Model
{  
    use LogsActivity;
    protected  $fillable=['name_en','name_ar','description_en','description_ar','image','item_id','open_at','url','image_url'];
   
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
