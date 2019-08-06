<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Item extends Model
{
    use SoftDeletes, LogsActivity;

    /**
     * Define Items Status Const
     * 
     * @var array
     */
    const ItemStatus = [
        1 => 'lost',
        2 => 'found',
        3 => 'mine',
        'lost' => 1,
        'found' => 2,
        'mine' => 3
    ];

    /**
     * Define Owner OF The Item
     *
     * @return void
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Define The Founder Of The Item "In Case Of Lost Item"
     *
     * @return void
     */
    public function founder()
    {
        return $this->belongsTo(User::class, 'founder_id');
    }

    /**
     * Define QrCode Of The Item
     *
     * @return void
     */
    public function qrcode()
    {
        return $this->belongsTo(Qrcodes::class, 'item_id');
    }

    /**
     * Define The Category OF The Item
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Define The Images Of The Item
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(ItemImages::class);
    }

    /**
     * Define The Requests For The Item "In Case Of Lost Item"
     * This Function Define The Requestes Made By Users That Claim That They Own This Lost Item.
     *
     * @return void
     */
    public function item_requests()
    {
        return $this->hasMany(ItemRequests::class);
    }

    /**
     * Define Questions For This Item "In Case Of Lost Item"
     *
     * @return void
     */
    public function questions()
    {
        return $this->hasMany(Questions::class);
    }

    /**
     * Scope Lost Items 
     *
     * @param object $query 
     * @return void
     */
    public function scopeLost($query)
    {
        return $query->where('status', self::ItemStatus['lost']);
    }

    /**
     * Scope Found Items
     *
     * @param object $query
     * @return void
     */
    public function scopeFound($query)
    {
        return $query->where('status', self::ItemStatus['found']);
    }

    /**
     * Scope Item Of Specific Category
     *
     * @param object $query
     * @param int $category_id
     * @return void
     */
    public function scopeCategory($query, $category_id)
    {
        return $query->where('category_id', $category_id) ?? null;
    }

    /**
     * Scope Items That Owned By This User
     *
     * @param object $query
     * @param int $owner_id
     * @return void
     */
    public function scopeOwner($query, $owner_id)
    {
        return $query->where('owner_id', $owner_id) ?? null;
    }

    /**
     * Scope Items That Founded By This User
     *
     * @param object $query
     * @param int $founder_id
     * @return void
     */
    public function scopeFounder($query, $founder_id)
    {
        return $query->where('founder_id', $founder_id) ?? null;
    }

    /**
     * Scope Single Item
     *
     * @param object $query
     * @param int $item_id
     * @return void
     */
    public function scopeItem($query, $item_id)
    {
        return $query->where('id', $item_id) ?? null;
    }
}
