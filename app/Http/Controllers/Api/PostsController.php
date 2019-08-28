<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostImages;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;
use Log;
use App;
use App\Item;
use Carbon\Carbon;
class PostsController extends Controller
{
 

    public function index(Request $request)
    {
        $Posts = QueryBuilder::for(Post::class)
        ->with('publisher')
        ->with('item')
        ->with('images')
        ->allowedFilters([
            Filter::scope('status'),//lost or found
            Filter::scope('publisher'),//Publisher ID
            Filter::scope('item'),//Item ID
           'id','title', 'description',
        ])
        ->paginate($request->get('per_page', 15));

        return $this->jsonResponse($Posts);
    }



    public function userposts(Request $request,$publisher_id)
    {
        
        $Posts = QueryBuilder::for(Post::class)
        ->with('publisher')
        ->with('item')
        ->with('images')
        ->publisher($publisher_id)
        ->allowedFilters([
            Filter::scope('status'),//lost or found
            Filter::scope('item'),//Item ID
            'id','title', 'description',
        ])
        ->paginate($request->get('per_page', 15));

        return $this->jsonResponse($Posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate_request = Validator::make(request()->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'description' => ['required', 'min:20', 'max:500'],
            'publisher_id' => ['required'],
            'status' => ['required'],
            'lat' => ['required'],
            'lng' => ['required'],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
            return $this->response();
        }
    
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
