<?php

namespace App;

use Log;
use App\Color;
use App\Model;
use App\ItemImages;
use Illuminate\Http\Request;
use App\Helpers\Api\ResponseTrait;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as MasterModel;

class Item extends MasterModel
{
    use SoftDeletes, LogsActivity,  ResponseTrait;

    protected $fillable = ['title', 'details', 'owner_id', 'model_id', 'color_id', 'sub_category_id', 'brand_id'];

    /**
     * Define Items Status Const
     *
     * @var array
     */
    const ITEM_STATUS = [
        0 => 'lost',
        1 => 'found',
        2 => 'mine',
        'lost' => 0,
        'found' => 1,
        'mine' => 2
    ];
    protected $images_path = "/images/items/";

    /**
     * Define Owner OF The Item
     *
     * @return void
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'item_id');
    }

    public function getStatus()
    {
        return self::ITEM_STATUS[$this->status] ?? "";
    }

    //This relations for Depend
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function isLost()
    {
        return $this->status == self::ITEM_STATUS['lost'];
    }

    public function isFound()
    {
        return $this->status == self::ITEM_STATUS['found'];
    }

    public function subcategory()
    {
        return $this->belongsTo(subcategory::class);
    }
    public function model()
    {
        return $this->belongsTo(Model::class, 'model_id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }



    /**
     * Define QrCode Of The Item
     *
     * @return void
     */
    public function qrcode()
    {
        return $this->hasOne(Qrcode::class);
    }




    /**
     * Define The Images Of The Item
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(ItemImage::class, 'item_id');
    }


    /**
     * Define Questions For This Item "In Case Of Lost Item"
     *
     * @return void
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Scope Lost Items
     *
     * @param object $query
     * @return void
     */
    public function scopeLost($query)
    {
        return $query->where('status', self::ITEM_STATUS['lost']);
    }

    /**
     * Scope Found Items
     *
     * @param object $query
     * @return void
     */
    public function scopeFound($query)
    {
        return $query->where('status', self::ITEM_STATUS['found']);
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

    public function scopeModel($query, $model_id)
    {
        return $query->where('model_id', $model_id) ?? null;
    }

    public function scopeColor($query, $color_id)
    {
        return $query->where('color_id', $color_id) ?? null;
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
     * Scope Public Items Only
     *
     * @param object $query
     * @return void
     */
    public function scopePublicItems($query)
    {
        return $query->where('is_public', true);
    }


    public function scopePrivateItemsForAuthUser($query, $user_id)
    {
        return $query->where('owner_id', $user_id)->orWhere('founder_id', $user_id);
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
