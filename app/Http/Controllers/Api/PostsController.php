<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Post;
use App\Question;
use Carbon\Carbon;
use App\PostReport;
use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SearchPostResource;

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
            'images' => ['sometimes', 'array', 'size:5'],
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

        $city_id =  City::where('name_en', 'like', '%' . $request->city . '%')
            ->orWhere('name_ar', 'like', '%' .  $request->city . '%')
            ->firstOrCreate(['name_en' => $request->city, 'name_ar' => $request->city]);

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
            $post->save();
        }

        if ($type == "found") {
            $post->fill([
                'status' => self::TYPES[$type],
                'founder_id' => auth('api')->user()->id,
                'founded_at' => Carbon::now()->toDateTimeString(),
            ]);
            $post->save();
            array_map(function ($question) use ($post) {
                $post->questions()->create([
                    'founder_id' => auth('api')->user()->id,
                    'question' => $question,
                ]);
            }, $request->questions);
        }

        if ($request->has('images')) {
            array_map(function ($image) use ($post, $request) {
                $post->images()->create([
                    'image' =>  $image->store('images/postsimages')
                ]);
            }, $request->images);
        }

        $this->addResponse(trans('messages.successfully_created'))->addStatusCode(201);

        return $this->response();
    }

    public function report(Request $request, Post $post)
    {
        $validate_request = Validator::make(request()->all(), [
            'details' => ['nullable', 'string', 'max:1000'],
            'image' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:5102'],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        $postReport = PostReport::create([
            'post_id' => $post->id,
            'user_id' => auth('api')->user()->id,
            'details' => $request->details,
        ]);

        if ($request->has('image')) {
            $postReport->fill([
                'image' =>   $request->file('image')->store('images/postreports')
            ]);
            $postReport->save();
        }

        if ($post->reports()->count() >= env('REPORTS_NUMBER')) {
            $post->update(['appearance_status' => 0]);
        }

        $post->increment('reports_number');

        $this->addResponse(trans('posts.post_report_message'))->addStatusCode(200);

        return  $this->response();
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(Request $request, Post $post)
    {
        $user = auth('api')->user();
        if ($user->can('update', $post)) {
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
    }

    public function destroy(Post $post)
    {
        $user = auth('api')->user();
        if ($user->can('destroy', $post)) {
            $post->delete();
            $this->addResponse(trans('posts.successfully_deleted'))->addStatusCode(200);
            return  $this->response();
        }
        $this->addResponse(trans('posts.not_authorized'))->addStatusCode(400);
        return  $this->response();
    }
}
