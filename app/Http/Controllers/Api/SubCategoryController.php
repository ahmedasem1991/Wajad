<?php

namespace App\Http\Controllers\Api;

use App\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;

class SubCategoryController extends Controller
{
    public function index()
    {
        return SubCategoryResource::collection(SubCategory::all());
    }

    public function show(SubCategory $subCategory)
    {
        return new SubCategoryResource($subCategory);
    }
}
