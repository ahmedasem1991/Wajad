<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    /**
     * Define Associated Packges For Products
     *
     * @return void
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_product_table', 'product_id', 'package_id')
            ->withPivot('product_count');
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
