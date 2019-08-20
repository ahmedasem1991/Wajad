<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = [];
    
    /**
     * Define Associated Packges For Products
     *
     * @return void
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_product_table', 'product_id', 'package_id');
    }

    /**
     * Define Morph Relation
     *
     * @return void
     */
    public function media()
    {
        return $this->morphMany(PackageProductMedia::class, 'package_product_media');
    }
}
