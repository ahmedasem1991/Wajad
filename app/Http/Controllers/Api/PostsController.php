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
use Location\Coordinate;
use Location\Distance\Vincenty;
use DB;
use function GuzzleHttp\json_decode;

class PostsController extends Controller
{
    private $request=[];
    
 

    public function index(Request $request)
    {
        $Posts = QueryBuilder::for(Post::class)
        ->with('publisher')
        ->with('owner')
        ->with('founder')
        ->with('item')
        ->with('images')
        ->allowedFilters([
            Filter::scope('status'),//lost or found
            Filter::scope('publisher'),//Publisher ID
            Filter::scope('owner'),//Owner ID
            Filter::scope('founder'),//Founder ID
            Filter::scope('item'),//Item ID
            Filter::scope('category'),//Category ID
           'id','title', 'description',
        ])->orderby('id','desc')->paginate($request->get('per_page', 15));
            $this->request['lat']=$request->lat;
            $this->request['lng']=$request->lng;
            $this->request['distance']=$request->distance;
            $Posts = $Posts->filter(function ($Post) {
            $coordinate1 = new Coordinate($Post->lat, $Post->lng);  
            $coordinate2 = new Coordinate($this->request['lat'],$this->request['lng']);  
            $calculator  = new Vincenty();
            $Post->distance=  ($calculator->getDistance($coordinate1, $coordinate2))/1000; 
            return $Post->distance < $this->request['distance'];
        });
  
        return $this->jsonResponse($Posts);
    }



    public function userposts(Request $request,$publisher_id)
    {
        
        $Posts = QueryBuilder::for(Post::class)
        ->with('publisher')
        ->with('owner')
        ->with('founder')
        ->with('item')
        ->with('images')
        ->publisher($publisher_id)
        ->allowedFilters([
            Filter::scope('status'),//lost or found
            Filter::scope('owner'),//Owner ID
            Filter::scope('founder'),//Founder ID
            Filter::scope('item'),//Item ID
            Filter::scope('category'),//Category ID
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
        'category_id' =>['required_without:item_id']
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
