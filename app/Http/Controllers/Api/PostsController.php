<?php

namespace App\Http\Controllers\Api;

use DB;
use App;
use Log;
use App\Item;
use App\Post;
use App\PostType;
use Carbon\Carbon;
use App\PostImage;
use Location\Coordinate;
use Illuminate\Http\Request;
use Location\Distance\Vincenty;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use function GuzzleHttp\json_decode;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    private $request=[];
    
 

    public function index(Request $request)
    {   $check=1;
        $array=   $Posts = QueryBuilder::for(Post::class)
        ->with('publisher')
        ->with('owner')
        ->with('founder')
        ->with('item')
        ->with('model')
        ->with('color')
        ->with('subcategory')
        ->with('images')
        ->with('postType')
        ->allowedFilters([
            Filter::scope('status'),//lost or found
            Filter::scope('publisher'),//Publisher ID
            Filter::scope('owner'),//Owner ID
            Filter::scope('founder'),//Founder ID
            Filter::scope('item'),//Item ID
            Filter::scope('subcategory'),//subcategory ID
            Filter::scope('model'),//model ID
            Filter::scope('color'),//color ID
            Filter::scope('postType'),//Post type ID
           'id','title', 'description',
        ])->orderby('id','desc')->paginate($request->get('per_page', 15));
            $this->request['lat']=$request->lat;
            $this->request['lng']=$request->lng;
            if($request->unit=='m')
            {
                $this->request['distance']=$request->distance*0.62137;
            }
            else{
                $this->request['distance']=$request->distance;
            }
            
            if ($request->has('distance')) {
                $check=0;
                $Posts = $Posts->filter(function ($Post) {
                $coordinate1 = new Coordinate($Post->lat, $Post->lng);  
                $coordinate2 = new Coordinate($this->request['lat'],$this->request['lng']);  
                $calculator  = new Vincenty();
                $Post->distance=  ($calculator->getDistance($coordinate1, $coordinate2))/1000; 
                return $Post->distance < $this->request['distance'];
            });
           }


           if ($check==0) {
               $array=[];
               $array['data']=$Posts;
           }
 
        
        return $this->jsonResponse($array);
    }



    public function userPosts(Request $request,$publisher_id)
    {
        
        $Posts = QueryBuilder::for(Post::class)
        ->with('publisher')
        ->with('owner')
        ->with('founder')
        ->with('model')
        ->with('color')
        ->with('item')
        ->with('images')
        ->publisher($publisher_id)
        ->allowedFilters([
            Filter::scope('status'),//lost or found
            Filter::scope('owner'),//Owner ID
            Filter::scope('founder'),//Founder ID
            Filter::scope('item'),//Item ID
            Filter::scope('subcategory'),//subcategory ID
            Filter::scope('model'),//model ID
            Filter::scope('color'),//color ID
            'id','title', 'description',
        ])
        ->paginate($request->get('per_page', 15));

        return $this->jsonResponse($Posts);
    }


    public function postTypes(Request $request)
    {
        
        $PostTypes = QueryBuilder::for(PostType::class)
        ->paginate($request->get('per_page', 15));

        return $this->jsonResponse($PostTypes);
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
        'post_type_id' => ['required'],
        'lat' => ['required'],
        'lng' => ['required'],
        'model_id' =>['required_without:item_id'],
        'color_id' =>['required_without:item_id']
    ]);
    
    if ($validate_request->fails()) {
        $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
        return $this->response();
    }
    return (new Post)->createPost($request);
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
