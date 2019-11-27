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
        return $value . ' Day/s';
    }

    public function getPriceAttribute($value)
    {
        return $value . ' - ' . env('CURRENCY', 'USD');
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class,'package_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_id');
    }

    public function corporates()
    {
        return $this->belongsToMany(Corporate::class,'corporate_id');
    }
}
