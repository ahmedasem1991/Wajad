<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Color extends MasterModel
{
    use LogsActivity;

    protected $fillable=['name_en','name_ar'];
 
 
    public function model()
    {
        return $this->belongsTo(Model::class);
    }

 
}
