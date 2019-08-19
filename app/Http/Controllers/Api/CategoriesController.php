<?php

namespace App\Http\Controllers\Api;

use Response;
use App\Category;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = QueryBuilder::for(Category::class)
            ->withCount('items')
            ->allowedIncludes('items')
            ->allowedFilters([
                Filter::scope('category'), 
                'title',
            ])
            ->paginate($request->get('per_page', 15), '*', 'current_page');

        return $this->jsonResponse($categories);
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
