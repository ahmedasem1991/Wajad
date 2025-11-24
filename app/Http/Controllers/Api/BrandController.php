<?php

namespace App\Http\Controllers\Api;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    public function index($subcategory_id = null)
    {
        if (! is_null($subcategory_id)) {
            return BrandResource::collection(
                Brand::where('sub_category_id', $subcategory_id)->get()
            );
        }

        return BrandResource::collection(Brand::all());
    }
}
