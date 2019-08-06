<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Response;
use Spatie\QueryBuilder\QueryBuilder;
class CategoriesController extends Controller
{


    
 
 
    public function index(Request $request)
    {
        //'categories' => Category::withCount('items')->get()->makeHidden(['has_default_image', 'default_image','updated_at']),

        $categories = QueryBuilder::for(Category::class)
            ->allowedIncludes('items')
            ->withCount('items')
            ->allowedFields('id', 'title')
            ->allowedFilters('id','title')
            
            ->paginate($request->get('per_page', 15));
            //->makeHidden(['has_default_image', 'default_image','updated_at','created_at']);

        $this->addResponse($categories)->addStatusCode(200);

        return $this->response();
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
