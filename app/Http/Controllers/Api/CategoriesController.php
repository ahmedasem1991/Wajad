<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Response;
use Spatie\QueryBuilder\QueryBuilder;
class CategoriesController extends Controller
{


    public function __construct()
    {
        //$this->middleware('auth');
    }

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        return   Response::json(array(
            'categories' => Category::withCount('items')->get()->makeHidden(['has_default_image', 'default_image','updated_at']),
        //    'categories' => QueryBuilder::for(Category::class)
        //    ->allowedFilters('title')
        //    ->get()
             
        ));
    public function index(Request $request)
    {
        $categories = QueryBuilder::for(Category::class)
            ->allowedIncludes('items')
            ->paginate($request->get('per_page', 15));

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
