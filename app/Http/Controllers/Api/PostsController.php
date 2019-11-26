<?php

namespace App\Http\Controllers\Api;

use DB;
use App;
use Log;
use App\City;
use App\Item;
use App\Post;
use App\User;
use App\PostType;
use App\PostImage;
use Carbon\Carbon;
use App\PostReport;
use Location\Coordinate;
use Illuminate\Http\Request;
use Location\Distance\Vincenty;

use Spatie\QueryBuilder\Filter;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SearchPostResource;

class PostsController extends Controller
{
    private $request = [];

    public function index(Request $request)
    {
        $check = 1;
        $array =  $Posts = QueryBuilder::for(Post::class)
            ->IsOpen()->isApproved()->IsShow()
            ->with('publisher')
            ->with('owner')
            ->with('founder')
            ->with('item')
            ->with('model')
            ->with('color')
            ->with('subcategory')
            ->with('images')
            ->with('postType')
            ->allowedFilters([
                Filter::scope('status'), //lost or found
                Filter::scope('publisher'), //Publisher ID
                Filter::scope('owner'), //Owner ID
                Filter::scope('founder'), //Founder ID
                Filter::scope('item'), //Item ID
                Filter::scope('subcategory'), //subcategory ID
                Filter::scope('model'), //model ID
                Filter::scope('color'), //color ID
                Filter::scope('postType'), //Post type ID
                'id', 'title', 'description',
            ])->orderby('id', 'desc')->paginate($request->get('per_page', 15));
        $this->request['lat'] = $request->lat;
        $this->request['lng'] = $request->lng;
        if ($request->unit == 'm') {
            $this->request['distance'] = $request->distance * 0.62137;
        } else {
            $this->request['distance'] = $request->distance;
        }

        if ($request->has('distance')) {
            $check = 0;
            $Posts = $Posts->filter(function ($Post) {
                $coordinate1 = new Coordinate($Post->lat, $Post->lng);
                $coordinate2 = new Coordinate($this->request['lat'], $this->request['lng']);
                $calculator  = new Vincenty();
                $Post->distance = ($calculator->getDistance($coordinate1, $coordinate2)) / 1000;
                return $Post->distance < $this->request['distance'];
            });
        }


        if ($check == 0) {
            $array = [];
            $array['data'] = $Posts;
        }


        return $this->jsonResponse($array);
    }



    public function userPosts(Request $request, $publisher_id)
    {

        $Posts = QueryBuilder::for(Post::class)
            //   ->IsOpen()->isApproved()->IsShow()
            ->with('publisher')
            ->with('owner')
            ->with('founder')
            ->with('model')
            ->with('color')
            ->with('item')
            ->with('images')
            ->publisher($publisher_id)
            ->allowedFilters([
                Filter::scope('status'), //lost or found
                Filter::scope('owner'), //Owner ID
                Filter::scope('founder'), //Founder ID
                Filter::scope('item'), //Item ID
                Filter::scope('subcategory'), //subcategory ID
                Filter::scope('model'), //model ID
                Filter::scope('color'), //color ID
                'id', 'title', 'description',
            ])
            ->paginate($request->get('per_page', 15));

        return $this->jsonResponse($Posts);
    }


    public function postTypes(Request $request)
    {

        $PostTypes = QueryBuilder::for(PostType::class)
            ->paginate($request->get('per_page', 15));

        return $this->jsonResponse($PostTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'description' => ['required', 'min:9', 'max:500'],
            'status' => ['required', 'in:0,1'],
            'reward' => ['numeric'],
            'longitude' => ['required'],
            'latitude' => ['required'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'model_id' => ['required', 'exists:models,id'],
            'color_id' => ['required', 'exists:colors,id'],
            'item_id' => ['exists:items,id'],
            'city' => ['required'],
            'images' => ['sometimes', 'max:5'],
            'images.*' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:100000'],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        $request->merge(['publisher_id' => auth('api')->user()->id]);
        $request->merge([
            Post::Status[$request->status] . 'ed_at' =>
            Carbon::now()->toDateTimeString()
        ]);
        if ($request->status == 0) {
            $request->merge([
                'owner_id' =>
                auth('api')->user()->id
            ]);
        }
        if ($request->status == 1) {
            $request->merge([
                'founder_id' =>
                auth('api')->user()->id
            ]);
        }

        $city =  City::where('name_en', 'like', '%' . $request->city . '%')
            ->orWhere('name_ar', 'like', '%' .  $request->city . '%')->first();
        if (empty($city)) {
            $city = City::create([
                'name_en' =>  $request->city,
                'name_ar' =>  $request->city,
            ]);
        }
        $city_id = $city->id;
        $request->merge(['city_id' => $city_id]);

        if (
            auth('api')->user()->posts()->count() >
            auth('api')->user()->postLimitation->posts_limitation
        ) {
            $this->addResponse(trans('posts.posts_limitation_message'))->addStatusCode(400);
            return  $this->response();
        }
        $post = Post::create($request->all());
        if (!empty($request->images)) {
            foreach ($request->images as $image) {
                $file_name =  time() . str_random(10) . '.' . 'png';
                @list($type, $image) = explode(';', $image);
                @list(, $image) = explode(',', $image);
                if ($image != "") {
                    \File::put('images/postsimages/' . $file_name, base64_decode($image));
                }
                $image = PostImage::create([
                    'post_id' => $post->id,
                    'image' =>  'images/postsimages/' . $file_name
                ]);
            }
        }
        $this->addResponse(trans('messages.successfully_created'))->addStatusCode(201);
        return $this->response();
    }

    public function reportPost(Request $request)
    {
        $validate_request = Validator::make(request()->all(), [
            'post_id' => ['required', 'integer', 'exists:posts,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'details' => ['nullable', 'string', 'max:1000'],
            'image' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:5102'],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        $post_report = [
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'details' => $request->details,
        ];

        if ($request->file('image')) {
            $post_report['image'] = $request->file('image')->store('images/postreports');
        }

        PostReport::create($post_report);

        $post = Post::find($request->post_id);
        $post_reports_count = $post->reports()->count();

        if ($post_reports_count >= env('REPORTS_NUMBER')) {
            $post->appearance_status = 0;
            $post->save();
        }

        $post->increment('reports_number');

        $this->addResponse(trans('posts.post_report_message'))->addStatusCode(200);

        return  $this->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            $this->addResponse(trans('posts.not_found'))->addStatusCode(200);
            return  $this->response();
        }
        $post->delete();
        $this->addResponse(trans('posts.successfully_deleted'))->addStatusCode(200);
        return  $this->response();
    }
    public function search(Request $request)
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
        return  SearchPostResource::collection($posts->get());
    }
}
