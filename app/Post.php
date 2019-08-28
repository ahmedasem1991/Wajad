<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Log;
class Post extends Model
{
    use LogsActivity;

    protected $fillable = ['title', 'description', 'publisher_id', 'item_id', 'status', 'losted_at','founded_at','owner_id','founder_id','lat','lng'];
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
     * Images Of Post"
     */
    public function images()
    {
        return $this->hasMany(PostImages::class);   
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
     * Validation Of Post
     */

    public function postValidation(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'description' => ['required', 'min:20', 'max:500'],
            'publisher_id' => ['required'],
            'status' => ['required'],
            'lat' => ['required'],
            'lng' => ['required'],
        ]);

        $response=[];
        if ($validate_request->fails()) 
        {
             
            $response['status']= false;
            $response['message']= $validate_request->errors();
            return $response;
        }
       
         $response['status']= true;
         $response['message']= 'Success Validations';
         return $response;
        
  
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
        if($Item=Item::find($request->item_id))
        {
            $Item->status=$status;
            $Item->save();
        }
        try {
            $post = Post::create([
                'title' => request('title'),
                'description' => request('description'),
                'publisher_id' => request('publisher_id'),
                'owner_id' =>$owner_id,
                'founder_id' => $founder_id,
                'item_id' => request('item_id'),
                'status' => $status,
                'losted_at' => $losted_at,
                'founded_at' => $founded_at,
                'lat' => request('lat'),
                'lng' => request('lng'),
            ]);
    
            if ($post) {
                foreach($request->images as $image)
                { 
                   
                    $file_name =  time().str_random(10).'.'.'png';
                    @list($type, $image) = explode(';', $image);
                    @list(, $image) = explode(',', $image); 
                    if($image!=""){
                    \File::put( 'images/postimages/' . $file_name, base64_decode($image));
                    } 
                    $image=PostImages::create([
                        'post_id' =>$post->id,
                        'image' =>  'images/postimages/' .$file_name
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




        // public function is_lost()
    // {
    //     return $this->status === self::Status['lost'];
    // }
    // public function is_found()
    // {
    //     return $this->status === self::Status['found'];
    // }
 
}
