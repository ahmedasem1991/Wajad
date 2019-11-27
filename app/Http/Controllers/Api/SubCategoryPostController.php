<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\SubCategory;
use App\Helpers\Api\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\SubCategoryPostResource;

class SubCategoryPostController extends Controller
{
    use ResponseTrait;

    const TYPES = [
        'lost',
        'found'
    ];

    # request to filter posts based on subcategories and previuos status

    public function index($status, $subcategory_id = null)
    {
        abort_unless(in_array($status, self::TYPES), 404);

        $subCategory = SubCategory::whereHas($status . 'posts', function ($query) {
            return $query->isShow()->isOpen()->isApproved();
        })->get();

        $parentCategory = [
            'subCategoryName' => trans('keywords.all'),
            'subCategoryIcon' => env('APP_URL') . '/' . 'subcategories/all.png',
            'subCategoryPostsCount' => Post::$status()->isShow()->isOpen()->isApproved()->count(),
        ];

        $posts = Post::$status()->isShow()->isOpen()->isApproved()->where(function ($query) use ($subcategory_id) {
            if ($subcategory_id) {
                return $query->where('sub_category_id', $subcategory_id);
            }
        })->get();

        return SubCategoryPostResource::collection($subCategory)->additional([
            'parentCategory' => $parentCategory,
            'posts' => $posts
        ]);
    }
}
