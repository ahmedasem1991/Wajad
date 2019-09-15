<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable=[
    'template','name','title','slug','meta_title','meta_description','content'
    ];
}
