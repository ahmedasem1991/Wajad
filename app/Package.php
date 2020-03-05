<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
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
    public function getPeriod()
    {
        return $this->period . ' Day/s';
    }

    public function getPrice()
    {
        return $this->price . ' - ' . env('CURRENCY', 'USD');
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class, 'package_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function corporates()
    {
        return $this->belongsToMany(Corporate::class, 'corporate_id');
    }
}
