<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class PackageProductManagement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'package_product_table';

    /**
     * Retrive Package For This Management
     *
     * @return void
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Retrive Product For This Management
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = Str::slug($value);
    }
}
