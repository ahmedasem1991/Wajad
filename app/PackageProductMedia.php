<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageProductMedia extends Model
{
    use SoftDeletes;
    /**
     * Define Morph Relation
     *
     * @return void
     */
    public function package_product_media()
    {
        return $this->morphTo();
    }
}
