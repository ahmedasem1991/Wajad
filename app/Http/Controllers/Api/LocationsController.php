<?php

namespace App\Http\Controllers\Api;

use Response;
use App\Country;
use App\Region;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class LocationsController extends Controller
{
    public function index(Request $request)
    {
        $Country = QueryBuilder::for(Country::class)
            ->withCount('regions')
            ->with('regions')
            ->paginate($request->get('per_page', 15), '*', 'current_page');

        return $this->jsonResponse($Country);
    }

    public function regions(Request $request)
    {
        $Regions = QueryBuilder::for(Region::class)
            ->withCount('cities')
            ->with('cities')
            ->paginate($request->get('per_page', 15), '*', 'current_page');

        return $this->jsonResponse($Regions);
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
