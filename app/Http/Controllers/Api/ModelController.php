<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModelResource;
use App\Model;

class ModelController extends Controller
{
    public function index($brand_id = null)
    {
        if (!is_null($brand_id)) {
            return ModelResource::collection(
                Model::where('brand_id', $brand_id)->get()
            );
        }
        return ModelResource::collection(Model::all());
    }

    public function show(Model $model)
    {
        return new ModelResource($model);
    }
}
