<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyword extends Model
{
    use softDeletes;

    protected $fillable = ['keyword', 'searches'];
}
