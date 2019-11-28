<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Post;
use Carbon\Carbon;
use App\PostReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SearchPostResource;
use App\Question;

class PostsController extends Controller
{
    const TYPES = [
        'lost' => 0,
        'found' => 1
    ];
    public function store(Request $request, $type = null)
    {
        abort_unless(in_array($type, self::TYPES), 404);

        $validate_request = Validator::make(request()->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'description' => ['required', 'min:9', 'max:500'],
            'reward' => ['numeric'],
            'longitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'model_id' => ['required', 'exists:models,id'],
            'color_id' => ['required', 'exists:colors,id'],
            'item_id' => ['nullable', 'exists:items,id'],
            'city' => ['required', 'string'],
            'images' => ['sometimes', 'max:5'],
            'images.*' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:5012'],
            'questions' => ['sometimes',  'array', 'size:3'],
            'questions.*' => ['required', 'min:9', 'max:500'],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        if (auth('api')->user()->exceededPostLimitation()) {
            $this->addResponse(trans('posts.posts_limitation_message'))->addStatusCode(400);
            return  $this->response();
        }

        $city_id =  City::where('name_en', 'like', '%' . $request->city . '%')->orWhere('name_ar', 'like', '%' .  $request->city . '%')->firstOrCreate(['name_en' => $request->city, 'name_ar' => $request->city]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'reward' => $request->reward,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'color_id' => $request->color_id,
            'item_id' => $request->item_id,
            'city' => $request->city,
            'city_id' => $city_id->id
        ]);

        if ($type == "lost") {
            $post->fill([
                'status' => self::TYPES[$type],
                'owner_id' => auth('api')->user()->id,
                'losted_at' => Carbon::now()->toDateTimeString()
            ]);
            // $post->save();
        }

        if ($type == "found") {
            $post->fill([
                'status' => self::TYPES[$type],
                'founder_id' => auth('api')->user()->id,
                'founded_at' => Carbon::now()->toDateTimeString(),
            ]);
            // $post->save();
            array_map(function ($question) use ($post) {
                Question::create([
                    'founder_id' => auth('api')->user()->id,
                    'post_id' => $post->id,
                    'question' => $question,
                ]);
            }, $request->questions);
        }

        // if ($request->has('images')) {
        //     array_map(function ($image) use ($post, $request) {
        //         $post->images()->create([
        //             'image' =>  $request->file($image)->store('images/postsimages')
        //         ]);
        //     }, $request->images);
        // }

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
    public function show(Post $post)
    {
        return new PostResource($post);
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
        $post = Post::where('id', $id)->where('publisher_id', auth('api')->user()->id)->first();

        if ($post === null) {
            $this->addResponse(trans('posts.not_found'))->addStatusCode(400);
            return  $this->response();
        }
        $validate_request = Validator::make($request->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'description' => ['required', 'min:9', 'max:500'],
            'status' => ['required', 'in:0,1'],
            'reward' => ['numeric'],
            'longitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'model_id' => ['required', 'exists:models,id'],
            'color_id' => ['required', 'exists:colors,id'],
            'item_id' => ['nullable', 'exists:items,id'],
            'city' => ['required', 'string'],
            'images' => ['sometimes', 'max:5'],
            'images.*' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:5012'],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
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

        $post->update($request->all());

        if ($request->has('images')) {
            array_map(function ($image) use ($post, $request) {
                $post->images()->create([
                    'image' =>  $request->file($image)->store('images/postsimages')
                ]);
            }, $request->images);
        }

        $this->addResponse(trans('messages.successfully_updated'))->addStatusCode(200);

        return $this->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id)->where('publisher_id', auth('api')->user()->id)->first();
        if ($post === null) {
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
