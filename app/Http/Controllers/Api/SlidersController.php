<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class SlidersController extends Controller
{
    public function index(Request $request)
    {  
        $on_boarding = QueryBuilder::for(Banner::class)
            ->paginate($request->get('per_page', 15),['id','title_en as title','description_en as description','image','open_at','url','image_url','item_id','created_at','updated_at']);
            if($request->server('HTTP_ACCEPT_LANGUAGE')=='ar'
            )
            {
                $on_boarding = QueryBuilder::for(Banner::class)
                ->paginate($request->get('per_page', 15),['id','title_ar as title','description_ar as description','image','open_at','url','image_url','item_id','created_at','updated_at']);
            }

        return $this->jsonResponse($on_boarding);
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
