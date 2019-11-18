<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModelResource;
use App\Model;
class ModelController extends Controller
{
    public function index()
    {
        return ModelResource::collection(Model::all());
    }
    
    public function show(Model $model)
    {
        return new ModelResource($model);
    }
}
