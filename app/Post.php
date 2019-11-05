<?php

namespace App;

use DB;
use Log;
use App\Brand;
use App\Model;
use Carbon\Carbon;
use App\Nova\Categories;
use Illuminate\Http\Request;
use App\Helpers\Api\ResponseTrait;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Traits\LogsActivity;

 
class Post extends MasterModel
{
    use LogsActivity, ResponseTrait;

    protected $fillable = ['title', 'description', 'publisher_id', 'item_id', 'status', 'losted_at','founded_at','owner_id','founder_id','lat','lng','sub_category_id','model_id','color_id','post_type_id','appearance_status'];
 
    protected static $logAttributes = ['title', 'description'];

    protected $casts = [
        'losted_at' => 'datetime',
        'founded_at' => 'datetime'
    ];

    const Status = [
        0 => 'lost',
        1 => 'found',
        'lost' => 0,
        'found' => 1
    ];

    const AppearanceStatus = [
        0 => 'Hidden',
        1 => 'Show',
        'Hidden' => 0,
        'Show' => 1
    ];


     /**
     * Define The Relation Of The Item with Post
     */
    public function item()
    {
        return $this->belongsTo(Item::class);   
    }
    /**
     * Define The User was Published The Post with Post
     */
    public function publisher()
    {
        return $this->belongsTo(User::class,'publisher_id');   
    }

     /**
     * Define The Founder Of The Item "In Case Of Found Item"
     */
     public function founder()
    {
        return $this->belongsTo(User::class,'founder_id');   
    }
     /**
     * Define The Owner Of The Item "In Case Of Lost Item"
     */
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');   
    }

    /**
     * Define The Owner Of The Item "In Case Of Lost Item"
     */
    public function postType()
    {
        return $this->belongsTo(PostType::class,'post_type_id');   
    }

    /**
     * Define The Category Of The Post
     */
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');   
    }
    
    /**
     * Define The Brand Of The Post
     */
    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class,'brand_id');   
    // }
     /**
     * Define The Model Of The Post
     */
    public function model()
    {
        return $this->belongsTo(Model::class,'model_id');   
    }
     /**
     * Define The Color Of The Post
     */
    public function color()
    {
        return $this->belongsTo(Color::class,'color_id');   
    }
     /**
     * Images Of Post"
     */
    public function images()
    {
        return $this->hasMany(PostImage::class);   
    }
     /**
     * Define The Item  Of Post
     */
    public function scopeItem($query, $item_id)
    {
        return $query->where('item_id', $item_id);
    }
    /**
     * Define The Publisher  Of Post
     */

    public function scopePublisher($query, $publisher_id)
    {
        return $query->where('publisher_id', $publisher_id);
    }
        /**
     * Define The Owner  Of Item
     */

    public function scopeOwner($query, $owner_id)
    {
        return $query->where('owner_id', $owner_id);
    }
        /**
     * Define The Founder  Of Item
     */

    public function scopeFounder($query, $founder_id)
    {
        return $query->where('founder_id', $founder_id);
    }

 

    public function scopeModel($query, $model_id)
    {
        return $query->where('model_id', $model_id);
    }

    public function scopeColor($query, $color_id)
    {
        return $query->where('color_id', $color_id);
    }

    public function scopeSubcategory($query, $sub_category_id)
    {
        return $query->where('sub_category_id', $sub_category_id);
    }

     /**
     * Define The Status Of Post
     * 0 is lost
     * 1 is found
     */ 
    public function scopeStatus($query, $status)
    {
        $status = ($status== 'lost') ? 0 : 1;
        return $query->where('status', $status);
    }


         /**
     * Define The post type Of Post
     * 0 is lost
     * 1 is found
     */ 
    public function scopePostType($query, $post_type_id)
    {
        return $query->where('post_type_id', $post_type_id);
    }
 
 
    /**
     * Store a newly post  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function createPost(Request $request)
    {
       
        if($request->status=='lost')
        {
            $status =0;
            $losted_at=Carbon::now()->toDateTimeString();
            $founded_at=Null;
            $owner_id=$request->publisher_id;
            $founder_id=NULL;
        }
        else{
            $status =1;
            $losted_at=NULL;
            $founded_at=Carbon::now()->toDateTimeString();
            $owner_id=NULL;
            $founder_id=$request->publisher_id;
        }
        $color_id=$request->color_id;
        $model_id=$request->model_id;
        $sub_category_id=null;
       if( Model::find($model_id))
       $sub_category_id=Model::find($model_id)->brand->subcategory->id;
       
        if($Item=Item::find($request->item_id))
        {
            $Item->status=$status;
            $Item->save();
            $color_id= $Item->color_id;
            $model_id=$Item->model_id;
            $sub_category_id=$Item->model->brand->subcategory->id;
       
        }
        try {
            $post = Post::create([
                'title' => request('title'),
                'description' => request('description'),
                'publisher_id' => request('publisher_id'),
               // 'city' => request('city'),
                'owner_id' =>$owner_id,
                'founder_id' => $founder_id,
                'item_id' => request('item_id'),
                'status' => $status,
                'losted_at' => $losted_at,
                'founded_at' => $founded_at,
                'lat' => request('lat'),
                'lng' => request('lng'),
                'sub_category_id' => $sub_category_id,
                'model_id' => $model_id,
                'color_id' => $color_id,
            ]);
    
            if ($post) {
                foreach($request->images as $image)
                { 
                    $file_name =  time().str_random(10).'.'.'png';
                    @list($type, $image) = explode(';', $image);
                    @list(, $image) = explode(',', $image); 
                    if($image!=""){
                    \File::put( 'images/postsimages/' . $file_name, base64_decode($image));
                    } 
                    $image=PostImage::create([
                        'post_id' =>$post->id,
                        'image' =>  'images/postsimages/' .$file_name
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
