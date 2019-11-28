<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SearchPostResource;

class SearchController extends Controller
{
    public function searchByKeyWords(Request $request)
    {
        $keywords = $request->keywords ?? "";

        $posts = Post::IsApproved()->isShow()->isOpen()
            ->where('title', 'like', "%$keywords%")
            ->orWhere('description', 'like', "%$keywords%")
            ->orWhereHas('item', function ($query) use ($keywords) {
                return $query->orWhere([
                    ['title', 'like', "%$keywords%"],
                    ['details', 'like', "%$keywords%"]
                ]);
            })->get();

        return SearchPostResource::collection($posts);
    }
}
