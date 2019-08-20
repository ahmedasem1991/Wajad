<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    /**
     * Defin Packages Period Days
     *  
     * @return array
     */
    const PACKAGES_PERIOD = [
        // 1 => 1,
        // 2 => 7,
        // 3 => 30,
        // 4 => 365,
        1 => 'Dialy',
        2 => 'Weekly',
        3 => 'Monthly',
        4 => 'Yearly',
    ];

    /**
     * Define Associated Products In Package
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany(Products::class, 'package_product_table', 'package_id', 'product_id');
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

    /**
     * Define Const Packages PEriods
     *
     * @return array
     */
    public static function packagesPeriod()
    {
        return self::PACKAGES_PERIOD;
    }

    /**
     * Define Period Attribute
     * Mutate Period Row
     *
     * @param integer $value
     * @return void
     */
    // public function getPeriodAttribute($value)
    // {
    //     return self::PACKAGES_PERIOD[$value] ?? $value;
    // }

    public function getPriceAttribute($value)
    {
        return $value . ' - ' .env('CURRENCY', 'SR');
    }
}
