<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageProductMedia extends Model
{
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
