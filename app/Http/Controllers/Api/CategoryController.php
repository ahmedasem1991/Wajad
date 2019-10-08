<?php

namespace App\Http\Controllers\Api;

use Response;
use App\Category;
use App\Color;
use App\Brand;
use App\SubCategory;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use App\Model;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = QueryBuilder::for(Category::class)
            ->withCount('subcategories')
            ->allowedIncludes('subcategorieswithalldata')
            ->allowedFilters([
                Filter::scope('category'),
                'name_en','name_ar',
            ])->get();
           // ->paginate($request->get('per_page', env('PAGINATION_PER_PAGE', 15)), '*', 'current_page');

        return $this->jsonResponse($categories);
    }

    public function subcategories(Request $request)
    {
        $subcategories = QueryBuilder::for(SubCategory::class)
            
            ->allowedIncludes('brands','category')
            ->allowedFilters([
                Filter::scope('subcategory'),
                Filter::scope('category'),
                'name_en','name_ar',
            ])->get();
            // ->paginate($request->get('per_page', env('PAGINATION_PER_PAGE', 15)), '*', 'current_page');

        return $this->jsonResponse($subcategories);
    }

    public function brands(Request $request)
    {
        $Brands = QueryBuilder::for(Brand::class)
            
        ->allowedIncludes('models','subcategory')
        ->allowedFilters([
            Filter::scope('subcategory'),
            Filter::scope('brand'),
            'name_en','name_ar',
        ])->get();
            // ->paginate($request->get('per_page', env('PAGINATION_PER_PAGE', 15)), '*', 'current_page');

        return $this->jsonResponse($Brands);
    }

    public function models(Request $request)
    {
        $models = QueryBuilder::for(Model::class)
            ->allowedIncludes('brand','colors')
            ->allowedFilters([
                Filter::scope('brand'),
                Filter::scope('model'),
                'name_en','name_ar',
            ])->get();
            // ->paginate($request->get('per_page', env('PAGINATION_PER_PAGE', 15)), '*', 'current_page');

        return $this->jsonResponse($models);
    }

    public function colors(Request $request)
    {
        $colors = QueryBuilder::for(Color::class)
            ->allowedIncludes('model')
            ->allowedFilters([
                Filter::scope('color'),
                Filter::scope('model'),
                'name_en','name_ar',
            ])->get();
            // ->paginate($request->get('per_page', env('PAGINATION_PER_PAGE', 15)), '*', 'current_page');

        return $this->jsonResponse($colors);
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
