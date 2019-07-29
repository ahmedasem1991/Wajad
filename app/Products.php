<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This Class Is for Wajad Products.
 */
class Products extends Model 
{
    protected $table = 'wajada_products';

    /**
     * This function is used to return the user items which purchashed
     * for a specific wajad product..
     *
     * @return Relation
     */
    public function products_items()
    {
        return $this->belongsToMany(Item::class,'cards', 'product_id', 'item_id');
    }
}