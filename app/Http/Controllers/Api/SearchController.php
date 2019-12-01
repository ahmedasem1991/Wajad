<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class SearchController extends Controller
{
    public function searchByKeyWords(Request $request)
    {
        $keywords = $request->keywords ?? "";

        $posts = Post::isApproved()->isShow()->isOpen()
            ->where('title', 'like', "%$keywords%")
            ->orWhere('description', 'like', "%$keywords%")
            ->orWhereHas('item', function ($query) use ($keywords) {
                return $query->orWhere([
                    ['title', 'like', "%$keywords%"],
                    ['details', 'like', "%$keywords%"]
                ]);
            })->get();

        return PostResource::collection($posts);
    }

    public function searchFilter(Request $request)
    {
        $posts = Post::isShow()->isApproved();
        if ($request->has('color')) {
            $posts->whereHas('color', function ($query) use ($request) {
                $query->where('id', '=', $request->color);
            });
        }
        if ($request->has('model')) {
            $posts->whereHas('model', function ($query) use ($request) {
                $query->where('id', $request->model);
            });
        }
        if ($request->has('brand')) {
            $posts->whereHas('brand', function ($query) use ($request) {
                $query->where('id', $request->brand);
            });
        }
        if ($request->has('date')) {
            $posts->where('losted_at', Carbon::parse($request->date))
                ->orWhere('founded_at', Carbon::parse($request->date));
        }
        if ($request->has('subcategory')) {
            $posts->whereHas('subcategory', function ($query) use ($request) {
                $query->where('id', $request->subcategory);
            });
        }
        return  PostResource::collection($posts->get());
    }
}
