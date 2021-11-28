<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Color;
use App\Region;
use App\Category;
use App\Keyword;
use Carbon\Carbon;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\RegionResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SubCategoryResource;

/**
 * @group Search
 */
class SearchController extends Controller
{
    /**
     * Search By KeyWords
     * @urlParam keywords string required
     * @response
     * {
     *     "total": 0,
     *     "count": 0,
     *     "per_page": 25,
     *     "current_page": 2,
     *     "total_pages": 1,
     * "data": [
     * {
     * "id": 3,
     * "title": "Animi consectetur et expedita sit corrupti officia qui.",
     * "approval_status": 1,
     * "reward": 0,
     * "description": "Voluptatem voluptate nesciunt nemo assumenda magni. Iste qui quia est aut. Beatae ea similique vero et quis. Dolorum aspernatur qui deserunt deserunt optio explicabo. Aut culpa autem dolor a omnis qui. Hic esse mollitia earum unde et. Eum qui tempore excepturi repellat illum. Aut ad adipisci iure est assumenda eligendi qui nemo. Modi eos libero molestiae saepe reiciendis corporis quia eveniet. Eveniet ad ducimus aspernatur in praesentium omnis voluptatem. In vel voluptatem itaque voluptatem sunt. Ad aperiam et amet et.",
     * "status": "lost",
     * "attached_to_item": false,
     * "item": null,
     * "subCategory": {
     *  "id": 6,
     * "name": "Et expedita est explicabo qui sit veritatis.",
     *  "description": "Dolore rerum quo quis explicabo magni occaecati.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     *  },
     *  "model": {
     *  "id": 4,
     *  "name": "Deleniti quis et ut sapiente dolores sunt.",
     * "description": "Sapiente quaerat et in suscipit.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     *  },
     * "color": null,
     * "date": "2019-12-04 18:49:46",
     *  "images": [],
     *  "questions": [],
     *  "city": null
     *  },
     * {
     *  "id": 4,
     * "title": "Quo cupiditate quod quae recusandae iure voluptas voluptas.",
     * "approval_status": 1,
     * "reward": 0,
     * "description": "Dolorem libero vitae eos eveniet et repellat. Veritatis eos officiis quaerat esse reprehenderit quaerat non. Hic laboriosam tenetur asperiores nemo distinctio. Rerum libero dicta et pariatur. Eveniet repudiandae consequatur quasi vero. Sit sit sunt quasi esse et debitis. Placeat non porro molestiae. Porro reprehenderit voluptas modi dolorem et. Et rerum cupiditate tempora et saepe iusto est aut. Consectetur repellendus aliquam et non in optio. Ab rerum aliquam est aspernatur laudantium suscipit. Facilis quod sed accusamus sunt ducimus nulla. Incidunt quia eligendi aut ut praesentium culpa perferendis. Ut nihil doloribus dolores. Atque qui saepe et sunt enim architecto inventore consequatur. Fugiat temporibus voluptas voluptatem sed dolor officia. Et quibusdam provident repellendus facere. Voluptas voluptatem quis ut voluptatum deserunt. Nostrum ratione fugiat qui aut nihil. Et voluptatem adipisci impedit cumque recusandae. Ut consequatur delectus ea dolor labore quaerat. Quisquam quisquam non vel.",
     * "status": "found",
     *  "attached_to_item": false,
     * "item": null,
     * "subCategory": {
     * "id": 8,
     * "name": "Qui maiores aut sapiente aut molestiae in quam ipsam.",
     *  "description": "Aut soluta laborum sequi et similique.",
     *  "image": "http:\/\/wajad.test\/default-icon.png"
     * },
     * "model": {
     * "id": 5,
     *        "name": "Id fugit corporis harum expedita.",
     *      "description": "Fugiat nesciunt quasi sequi autem.",
     *    "image": "http:\/\/wajad.test\/default-icon.png"
     * },
     * "color": null,
     * "date": "2019-12-04 18:49:46",
     * "images": [],
     *  "questions": [],
     * "city": null
     * }
     * ]
     * }
     * @response
     * @return void
     */
    public function searchByKeyWords(Request $request)
    {
        $keywords = $request->keywords ?? "";

        $exp_keywords = explode(' ', $keywords);
        foreach ($exp_keywords as $key){
            $keyword = strtolower($key);
            $found = Keyword::firstOrNew(['keyword'=>$keyword]);
            $found->increment('searches');
            $found->save();
        }

        $posts = Post::isApproved()->isShow()->isOpen()
            ->where('title', 'like', '%'.$keywords.'%')
            ->orWhere('description', 'like', '%'.$keywords.'%')
             ->orWhereHas('item', function ($query) use ($keywords) {
                $query->where('title', 'like', '%'.$keywords.'%');
            })
            ->orWhereHas('item', function ($query) use ($keywords) {
                $query->Where('title', 'like', '%'.$keywords.'%');
            })
            ->paginate(25);

        return collect([
            'total' => $posts->total(),
            'count' => $posts->count(),
            'per_page' => $posts->perPage(),
            'current_page' => $posts->currentPage(),
            'total_pages' => $posts->lastPage(),
            'data' => PostResource::collection($posts)
        ]);
    }
    /**
     * Search Filter
     * @bodyParam model int exist in models.
     * @bodyParam color int exist in colors.
     * @bodyParam brand int exist in brands.
     * @bodyParam subcategory int exist in subcategories.
     * @bodyParam date date
     * @bodyParam status int in:0,1,0 for lost, 1 for found
     * @response
     * {
     *     "total": 0,
     *     "count": 0,
     *     "per_page": 25,
     *     "current_page": 2,
     *     "total_pages": 1,
     * "data": [
     * {
     * "id": 3,
     * "title": "Animi consectetur et expedita sit corrupti officia qui.",
     * "approval_status": 1,
     * "reward": 0,
     * "description": "Voluptatem voluptate nesciunt nemo assumenda magni. Iste qui quia est aut. Beatae ea similique vero et quis. Dolorum aspernatur qui deserunt deserunt optio explicabo. Aut culpa autem dolor a omnis qui. Hic esse mollitia earum unde et. Eum qui tempore excepturi repellat illum. Aut ad adipisci iure est assumenda eligendi qui nemo. Modi eos libero molestiae saepe reiciendis corporis quia eveniet. Eveniet ad ducimus aspernatur in praesentium omnis voluptatem. In vel voluptatem itaque voluptatem sunt. Ad aperiam et amet et.",
     * "status": "lost",
     * "attached_to_item": false,
     * "item": null,
     * "subCategory": {
     *  "id": 6,
     * "name": "Et expedita est explicabo qui sit veritatis.",
     *  "description": "Dolore rerum quo quis explicabo magni occaecati.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     *  },
     *  "model": {
     *  "id": 4,
     *  "name": "Deleniti quis et ut sapiente dolores sunt.",
     * "description": "Sapiente quaerat et in suscipit.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     *  },
     * "color": null,
     * "date": "2019-12-04 18:49:46",
     *  "images": [],
     *  "questions": [],
     *  "city": null
     *  },
     * {
     *  "id": 4,
     * "title": "Quo cupiditate quod quae recusandae iure voluptas voluptas.",
     * "approval_status": 1,
     * "reward": 0,
     * "description": "Dolorem libero vitae eos eveniet et repellat. Veritatis eos officiis quaerat esse reprehenderit quaerat non. Hic laboriosam tenetur asperiores nemo distinctio. Rerum libero dicta et pariatur. Eveniet repudiandae consequatur quasi vero. Sit sit sunt quasi esse et debitis. Placeat non porro molestiae. Porro reprehenderit voluptas modi dolorem et. Et rerum cupiditate tempora et saepe iusto est aut. Consectetur repellendus aliquam et non in optio. Ab rerum aliquam est aspernatur laudantium suscipit. Facilis quod sed accusamus sunt ducimus nulla. Incidunt quia eligendi aut ut praesentium culpa perferendis. Ut nihil doloribus dolores. Atque qui saepe et sunt enim architecto inventore consequatur. Fugiat temporibus voluptas voluptatem sed dolor officia. Et quibusdam provident repellendus facere. Voluptas voluptatem quis ut voluptatum deserunt. Nostrum ratione fugiat qui aut nihil. Et voluptatem adipisci impedit cumque recusandae. Ut consequatur delectus ea dolor labore quaerat. Quisquam quisquam non vel.",
     * "status": "found",
     *  "attached_to_item": false,
     * "item": null,
     * "subCategory": {
     * "id": 8,
     * "name": "Qui maiores aut sapiente aut molestiae in quam ipsam.",
     *  "description": "Aut soluta laborum sequi et similique.",
     *  "image": "http:\/\/wajad.test\/default-icon.png"
     * },
     * "model": {
     * "id": 5,
     *        "name": "Id fugit corporis harum expedita.",
     *      "description": "Fugiat nesciunt quasi sequi autem.",
     *    "image": "http:\/\/wajad.test\/default-icon.png"
     * },
     * "color": null,
     * "date": "2019-12-04 18:49:46",
     * "images": [],
     *  "questions": [],
     * "city": null
     * }
     * ]
     * }
     * @return void
     */
    public function searchFilter(Request $request)
    {
        $validate_request = Validator::make($request->all(), [
            'status' => ['nullable', 'integer', 'in:0,1'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $posts = Post::isShow()->isApproved()->isOpen()->where(function($query_master) use($request){
            if ($request->has('color') && $request->color != "") {
                $query_master->whereHas('color', function ($query) use ($request) {
                    $query->where('id', '=', $request->color);
                });
            }
            if ($request->has('model') && $request->model != "") {
                $query_master->whereHas('model', function ($query) use ($request) {
                    $query->where('id', $request->model);
                });
            }
            if ($request->has('brand') && $request->brand != "") {
                $query_master->whereHas('brand', function ($query) use ($request) {
                    $query->where('id', $request->brand);
                });
            }
          
    
            if ($request->has('region_id') && $request->region_id != "") {
                $query_master->where('region_id', '=',  $request->region_id);
            }
    
            if ($request->has('subcategory') && $request->subcategory != "") {
                $query_master->whereHas('subcategory', function ($query) use ($request) {
                    $query->where('id', $request->subcategory);
                });
            }
    
            if ($request->has('status') && $request->status != ""  && !is_null($request->status)) {
                $query_master->where('status', (int) $request->status);
            }
            if ($request->has('date') && $request->date != "") {
                $query_master
                //->whereDate('losted_at', '=',  $request->date)
                    ->orWhereDate('founded_at', '=',  $request->date);
            }

        }
    )->paginate(25);
       
       // $posts = $posts;
        return collect([
            'total' => $posts->total(),
            'count' => $posts->count(),
            'per_page' => $posts->perPage(),
            'current_page' => $posts->currentPage(),
            'total_pages' => $posts->lastPage(),
            'data' => PostResource::collection($posts)
        ]);
    }
    /**
     * Get search data in Dropdown lists
     * @response
     * {
     *   "regions": [
     *      {
     *         "id": 1,
     *        "name": "Al Riyadh Region"
     *   }
     *],
     *"subcategories": [
     *   {
     *      "id": 1,
     *     "name": "opjmp",
     *    "description": "jmiojoi",
     *   "image": "http://wajad.test/images/default.png",
     *  "brands": [
     *     {
     *        "id": 1,
     *       "name": "pojmop",
     *      "description": "ijoi",
     *     "image": "http://wajad.test/images/default.png",
     *    "models": [
     *       {
     *          "id": 1,
     *         "name": "jhinoi",
     *        "description": "pjipo",
     *       "image": "http://wajad.test/images/default.png"
     *  }
     *  ]
     *}
     * ]
     *}
     *],
     *"colors": [
     *   {
     *      "id": 1,
     *     "name": "Red",
     *    "icon": "images/colors/red.png"
     *}
     *]
     *}
     * @return void
     */
    public function fetchSearchData()
    {
        $subcategories = SubCategory::orderBy('name_'. app()->getLocale(),'asc')->get();

        $subcategories->load(['brands' => function($q){
            $q->orderBy('name_'. app()->getLocale(),'asc');
        },'brands.models' => function($q){
            $q->orderBy('name_'. app()->getLocale(),'asc');
        }]);

        $data = [
            'regions' => RegionResource::collection(Region::all()),
            'subcategories' => SubCategoryResource::collection($subcategories),
            'colors' => ColorResource::collection(Color::all())
        ];

        return response()->json($data);
    }
}
