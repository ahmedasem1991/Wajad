<?php

namespace App\Http\Controllers\Api;

use App\Item;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     * This function handle all requests for items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = QueryBuilder::for(Item::class)
            ->allowedIncludes('owner', 'category', 'images', 'questions', 'founder')
            ->allowedFilters([
                Filter::scope('lost'),
                Filter::scope('found'),
                Filter::scope('category'),
                Filter::scope('owner'),
                Filter::scope('founder'),
                Filter::scope('item'),
                'title', 'details', 'longitude', 'latitude',
            ])
            ->paginate($request->get('per_page', 15));

        $this->addResponse($items)->addStatusCode(200);

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
