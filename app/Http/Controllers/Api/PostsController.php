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
    public function store(Post $post,Request $request)
    {

    $ValidationResponse= $post->postValidation($request);
   
    if($ValidationResponse['status']==false)
    {
        $this->addMultibleResponse($ValidationResponse['message'])->addStatusCode(401);
        return $this->response();   
    }
    
   return $post->createPost($request);

 
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
