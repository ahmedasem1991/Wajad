<?php

namespace App\Http\Controllers\Api;

use App\Products;
use Stripe\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return ProductResource::collection(Products::paginate(env('PAGINATION_PER_PAGE', 15), '*', 'per_page'));
    }
}
