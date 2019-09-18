<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Page extends Model
{
    use LogsActivity;
    protected $fillable=[
    'template','name','title','slug','meta_title','meta_description','content'
    ];
}
