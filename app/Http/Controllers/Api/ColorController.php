<?php

namespace App\Http\Controllers\Api;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ColorResource;

class ColorController extends Controller
{
    public function index()
    {
        return ColorResource::collection(Color::all());
    }

    public function show(Color $color)
    {
        return new ColorResource($color);
    }
}
