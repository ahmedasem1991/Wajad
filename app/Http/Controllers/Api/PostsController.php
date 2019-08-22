<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Spatie\QueryBuilder\QueryBuilder;

class PostsController extends Controller
{
 

    public function index(Request $request)
    {
        $Posts = QueryBuilder::for(Post::class)
        ->with('publisher')
        ->with('item')
        ->with('images')
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
        //
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
