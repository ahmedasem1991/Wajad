<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Response;
use App\Brand;
use App\Color;
use App\Model;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function brands(Request $request)
    {
        if (
            $request->server('HTTP_ACCEPT_LANGUAGE') == 'ar'
        ) {
            $this->Feilds = ['id', 'name_ar as name', 'description_ar as description', 'image'];
        }
        $Brands = QueryBuilder::for(Brand::class)
            ->select($this->Feilds)
            ->allowedIncludes('models', 'subcategory')
            ->allowedFilters([
                Filter::scope('subcategory'),
                Filter::scope('brand'),
                Filter::scope('name'),
            ])
            ->get();
        $array['data'] = $Brands;
        return $this->jsonResponse($array);
    }

    public function models(Request $request)
    {
        if (
            $request->server('HTTP_ACCEPT_LANGUAGE') == 'ar'
        ) {
            $this->Feilds = ['id', 'name_ar as name', 'description_ar as description', 'image'];
        }
        $models = QueryBuilder::for(Model::class)
            ->select($this->Feilds)
            ->allowedIncludes('brand', 'colors')
            ->allowedFilters([
                Filter::scope('brand'),
                Filter::scope('model'),
                Filter::scope('name'),
            ])->get();
        $array['data'] = $models;

        return $this->jsonResponse($array);
    }

    public function colors(Request $request)
    {
        if (
            $request->server('HTTP_ACCEPT_LANGUAGE') == 'ar'
        ) {
            $this->ColorsFeilds = ['id', 'name_ar as name', 'icon'];
        }
        $colors = QueryBuilder::for(Color::class)
            ->select($this->ColorsFeilds)
            ->allowedIncludes('items')
            ->allowedFilters([
                Filter::scope('color'),
                Filter::scope('name'),
            ])
            ->get();
        $array['data'] = $colors;

        return $this->jsonResponse($array);
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
