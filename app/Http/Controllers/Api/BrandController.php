<?php

namespace App\Http\Controllers\Api;

use Response;
use App\Brand;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $categories = QueryBuilder::for(Brand::class)
            ->allowedIncludes('category')
            ->allowedFilters([
                Filter::scope('category'),
                'name_en','name_ar',
            ])
            ->paginate($request->get('per_page', env('PAGINATION_PER_PAGE', 15)), '*', 'current_page');

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
