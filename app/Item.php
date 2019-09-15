<?php

namespace App;

use Log;
use App\ItemImages;
use Illuminate\Http\Request;
use App\Helpers\Api\ResponseTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes, LogsActivity,  ResponseTrait;

    protected $fillable = ['title', 'details', 'owner_id', 'category_id'];
 
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
        return $this->hasMany(ItemImage::class);
    }

    /**
     * Define The Requests For The Item "In Case Of Lost Item"
     * This Function Define The Requestes Made By Users That Claim That They Own This Lost Item.
     *
     * @return void
     */
    public function item_requests()
    {
        return $this->hasMany(ItemRequest::class);
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



        /**
     * Store a newly item  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function createItem(Request $request)
    {
       


        try {
            $Item = Item::create([
            'title' => request('title'),
            'details' => request('details'),
            'owner_id' => request('owner_id'),
            'category_id' =>request('category_id'),
             ]);
    
            if ($Item) {
                if(request('qrcode_id') != NULL)
                {
                   $QRCode= Qrcodes::find(request('qrcode_id') );
                   $QRCode->item_id=$Item->id;
                   $QRCode->save();
                }
                foreach($request->images as $image)
                { 
                    $file_name =  time().str_random(10).'.'.'png';
                    @list($type, $image) = explode(';', $image);
                    @list(, $image) = explode(',', $image); 
                    if($image!=""){
                    \File::put( 'images/items/' . $file_name, base64_decode($image));
                    } 
                    $image=ItemImages::create([
                        'item_id' =>$Item->id,
                        'image' =>  'images/items/' .$file_name
                    ]);
                }
                  
            }
            else{
                $this->addResponse($this->unexpected_error)->addStatusCode(409);
                Log::ERROR($this->response());
                return $this->response();
                }
          
           $this->addResponse(trans( 'messages.successfully_created' ))->addStatusCode(201);
           Log::INFO($this->response());
           return $this->response();
           
        } catch (Exception $e) {
            $this->addResponse($e->getMessage)->addStatusCode(409);
            Log::ERROR($this->response());
            return $this->response();
        }
 
    }

}
