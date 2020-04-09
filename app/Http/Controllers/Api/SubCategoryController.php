<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Helpers\Api\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use Illuminate\Database\Eloquent\Builder;

class SubCategoryController extends Controller
{
    use ResponseTrait;

    const TYPES = [
        'lost' => 0,
        'found' => 1,
        'all' => 2,
    ];

    public function index($type = null)
    {
        if (!is_null($type) && in_array($type, self::TYPES)) {
            if ($type == 'lost') {
                return $this->subCategoryLostPosts();
            }
            if ($type == 'found') {
                return $this->subCategoryFoundPosts();
            }
        }
        return SubCategoryResource::collection(SubCategory::all());
    }

    public function subCategoryLostPosts()
    {
        return SubCategoryResource::collection(SubCategory::with([
            'posts' => function ($qurey) {
                $qurey->appearance()->isApproved();
            }
        ])->withCount('lostposts')->get());
    }

    public function subCategoryFoundPosts()
    {
        return SubCategoryResource::collection(SubCategory::with([
            'posts' => function ($qurey) {
                $qurey->appearance()->isApproved();
            }
        ])->withCount('lostposts')->get());
    }

    public function show(SubCategory $subCategory)
    {
        return new SubCategoryResource($subCategory);
    }
}
