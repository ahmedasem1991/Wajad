<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Post;
use Carbon\Carbon;
use App\PostReport;
use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

/**
 * @group Posts
 */
class PostsController extends Controller
{
    const TYPES = [
        'lost' => 0,
        'found' => 1
    ];

    /**
     * Create Post
     *
     * @bodyParam title string required min:6 max:255
     * @bodyParam description string required min:9 max:255
     * @bodyParam reward  numeric
     * @bodyParam longitude regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ required
     * @bodyParam latitude regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ required
     * @bodyParam sub_category_id int required exists:sub_categories,id
     * @bodyParam brand_id int required exists:brands,id
     * @bodyParam model_id int required exists:models,id
     * @bodyParam color_id int required exists:colors,id
     * @bodyParam item_id int nullable exists:items,id
     * @bodyParam city string required
     * @bodyParam images array sometimes size:5
     * @bodyParam images.* image sometimes mimes:jpeg,jpg,png,gif max:5012
     * @bodyParam questions array sometimes size:3
     * @bodyParam questions.* required min:9 max:500
     *
     * @response
     * {
     *  "success": true,
     *  "message": "Post created successfully.",
     *  "status_code": 200
     *}
     */
    public function store(Request $request, $type = null)
    {
        abort_unless(in_array($type, self::TYPES), 404);

        $validate_request = Validator::make(request()->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'description' => ['required', 'min:9', 'max:500'],
            'reward' => ['required', 'numeric'],
            'longitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'model_id' => ['required', 'exists:models,id'],
            'color_id' => ['required', 'exists:colors,id'],
            'item_id' => ['nullable', 'exists:items,id'],
            'city' => ['required', 'string'],
            'images' => ['sometimes', 'array', 'between:1,5'],
            'images.*' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:5012'],
            'questions' => ['sometimes',  'array', 'size:3'],
            'questions.*' => ['required', 'min:9', 'max:500'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if (auth('api')->user()->exceededPostLimitation()) {
            throw new ApiException(trans('messages.limited',  ['model' => trans('messages.attributes.post')]), 400);
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
            'city_id' => $city_id->id,
            'publisher_id' => auth('api')->user()->id,
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
                    'image' =>  $image->store('images/posts')
                ]);
            }, $request->images);
        }

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.post')]))->addStatusCode(201);

        return $this->response();
    }

    /**
     *  Report Post
     * @urlParam id required int Post Id
     *
     * @bodyParam details string nullable max:1000
     * @bodyParam image image sometimes mimes:jpeg,jpg,png,gif max:5102
     *
     * @response
     *{
     *  "success": true,
     *  "message": "Post reported successfully.",
     *  "status_code": 200
     *}
     */
    public function reportPost(Request $request, Post $post)
    {
        $validate_request = Validator::make(request()->all(), [
            'details' => ['nullable', 'string', 'max:1000'],
            'image' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:5102'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
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

        $this->addResponse(trans('messages.reported', ['model' => trans('messages.attributes.post')]))->addStatusCode(200);

        return  $this->response();
    }

    /**
     * Show Post
     *
     * @urlParam id required int Post Id
     *
     * @response
     * {
     *  "data": {
     *      "id": 1,
     *      "title": "asdasdasdasd",
     *      "approval_status": 1,
     *      "reward": 1111,
     *      "description": "asdasdasdasdasdasd",
     *      "status": "lost",
     *      "attached_to_item": true,
     *      "item": {
     *          "id": 1,
     *          "title": "mnbmn",
     *          "details": "mnbmnb",
     *          "status": "found",
     *          "owner": {
     *          "id": 1,
     *          "name": "Tarek Solaiman",
     *          "email": "tareksolaiman89@gmail.com",
     *          "status": 1,
     *          "mobile_number": "01063044180",
     *          "receive_emails": false,
     *          "receive_push_notifications": false,
     *          "is_email_verified": true,
     *          "is_mobile_number_verified": false,
     *          "default_distance_unit": "kilo"
     *      },
     *      "model": {
     *          "id": 1,
     *          "name": "nbnmbv",
     *          "description": "bvnbv",
     *          "image": "http://wajad.test/images/default.png"
     *      },
     *      "color": {
     *          "id": 1,
     *          "name": "sdfsf",
     *          "icon": "mnb"
     *      },
     *      "brand": null,
     *      "date": "2019-12-04 17:26:41",
     *      "images": []
     *      },
     *      "subCategory": {
     *          "id": 1,
     *          "name": "en",
     *          "description": "sdas",
     *          "image": "http://wajad.test/images/default.png"
     *      },
     *      "model": {
     *          "id": 1,
     *          "name": "nbnmbv",
     *          "description": "bvnbv",
     *          "image": "http://wajad.test/images/default.png"
     *      },
     *      "color": {
     *          "id": 1,
     *          "name": "sdfsf",
     *          "icon": "mnb"
     *      },
     *      "date": "2019-12-04 18:48:30",
     *      "images": [],
     *      "questions": [],
     *      "city": {
     *          "id": 1,
     *          "name": "cairo"
     *          }
     *      }
     *  }
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update Post
     * @urlParam id required int Post Id
     *
     * @bodyParam title string required min:6 max:255
     * @bodyParam description string required min:9 max:255
     * @bodyParam status  numeric required in:0,1
     * @bodyParam reward  numeric
     * @bodyParam longitude regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ required
     * @bodyParam latitude regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ required
     * @bodyParam sub_category_id int required exists:sub_categories,id
     * @bodyParam brand_id int required exists:brands,id
     * @bodyParam model_id int required exists:models,id
     * @bodyParam color_id int required exists:colors,id
     * @bodyParam item_id int nullable exists:items,id
     * @bodyParam city string required
     * @bodyParam images array sometimes size:5
     * @bodyParam images.* image sometimes mimes:jpeg,jpg,png,gif max:5012
     * @bodyParam questions array sometimes size:3
     * @bodyParam questions.* required min:9 max:500
     *
     * @response
     *{
     *  "success": true,
     *  "message": "Post updated successfully.",
     *  "status_code": 200
     * }
     *
     */

    public function update(Request $request, Post $post)
    {
        $user = auth('api')->user();

        if ($user->can('update', $post)) {
            $validate_request = Validator::make($request->all(), [
                'title' => ['required', 'min:6', 'max:255'],
                'description' => ['required', 'min:9', 'max:500'],
                'status' => ['required', 'in:0,1'],
                'reward' => ['required', 'numeric'],
                'longitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                'sub_category_id' => ['required', 'exists:sub_categories,id'],
                'brand_id' => ['required', 'exists:brands,id'],
                'model_id' => ['required', 'exists:models,id'],
                'color_id' => ['required', 'exists:colors,id'],
                'item_id' => ['nullable', 'exists:items,id'],
                'city' => ['required', 'string'],
                'images' => ['sometimes', 'array', 'between:1,5'],
                'images.*' => ['sometimes', 'image', 'mimes:jpeg,jpg,png,gif', 'max:5012'],
            ]);

            if ($validate_request->fails()) {
                throw new ApiException($validate_request->errors()->first(), 400);
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
                        'image' =>  $request->file($image)->store('images/posts')
                    ]);
                }, $request->images);
            }

            $this->addResponse(trans('messages.updated', ['model' => trans('messages.attributes.post')]))->addStatusCode(200);

            return $this->response();
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
    }

    /**
     * Delete Post
     *
     * @urlParam id required int Post Id
     *
     * @response
     * {
     *  "success": true,
     *  "message": "Post deleted successfully.",
     *  "status_code": 200
     *}
     */

    public function destroy(Post $post)
    {
        $user = auth('api')->user();
        if ($user->can('destroy', $post)) {
            $post->delete();
            $this->addResponse(trans('messages.deleted', ['model' => trans('messages.attributes.post')]))
                ->addStatusCode(200);
            return  $this->response();
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
    }
}
