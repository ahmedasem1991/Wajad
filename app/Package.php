<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    /**
     * Define Associated Products In Package
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'package_product_table', 'package_id', 'product_id')
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

    /**
     * Define Period Attribute
     * Mutate Period Row
     *
     * @param integer $value
     * @return void
     */
    public function getPeriodAttribute($value)
    {
        return $value . ' Month/s';
    }

    public function getPriceAttribute($value)
    {
        return $value . ' - ' . env('CURRENCY', 'SR');
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('starts_date');
    }
}
