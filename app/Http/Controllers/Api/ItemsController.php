<?php

namespace App\Http\Controllers\Api;

use App\Item;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;

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
            ->allowedIncludes('owner', 'category', 'images', 'questions', 'founder' ,'brand')
            ->allowedFilters([
                Filter::scope('lost'),
                Filter::scope('found'),
                Filter::scope('category'),
                Filter::scope('brand'),
                Filter::scope('owner'),
                Filter::scope('founder'),
                Filter::scope('item'),
                'title', 'details', 'longitude', 'latitude',
            ])
            ->paginate($request->get('per_page', env('PAGINATION_PER_PAGE', 15)), '*', 'current_page');
        
        return $this->jsonResponse($items);
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
            'details' => ['required', 'min:20', 'max:500'],
            'owner_id' => ['required','exists:users,id'],
            'category_id' => ['required','exists:categories,id'],
            'brand_id' => ['required','exists:brands,id'],
            
        ]);
        
        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
            return $this->response();
        }
        return (new Item)->createItem($request);
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
