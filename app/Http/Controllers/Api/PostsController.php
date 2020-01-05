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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

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
     * @urlParam type required string in:lost,found
     * @bodyParam title string required min:6 max:255
     * @bodyParam description string required min:9 max:255
     * @bodyParam reward  string
     * @bodyParam longitude regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ required
     * @bodyParam latitude regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ required
     * @bodyParam sub_category_id int required exists:sub_categories,id
     * @bodyParam brand_id int required exists:brands,id
     * @bodyParam model_id int required exists:models,id
     * @bodyParam color_id int required exists:colors,id
     * @bodyParam item_id int nullable exists:items,id
     * @bodyParam city string required
     * @bodyParam images array sometimes between:1,5
     * @bodyParam images.* image sometimes mimes:jpeg,jpg,png,gif max:5012
     * @bodyParam questions array sometimes size:3
     * @bodyParam questions.* required min:9 max:500
     * @bodyParam token Barier-token required
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

        $validate_request = Validator::make($request->all(), [
            'title' => ['required', 'min:6', 'max:255'],
            'description' => ['required', 'min:9', 'max:500'],
            'reward' => ['string'],
            'longitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'model_id' => ['required', 'exists:models,id'],
            'color_id' => ['required', 'exists:colors,id'],
            'item_id' => ['nullable', 'exists:items,id'],
            'city' => ['required', 'string'],
            'images' => ['sometimes', 'array', 'between:1,5'],
            'image.*' => ['sometimes', 'base64dimensions:min_width=100,min_height=200'],
            'questions' => ['sometimes',  'array', 'between:1,3'],
            'questions.*' => ['min:9', 'max:500'],
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

        $auto_approve=0;
        
       if(defaultGroup()->auto_approve==1) 
       {
           $auto_approve=1;
           $appearance_status=1;
        }
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
            'publisher_type' => 1,
            'auto_approve'=>$auto_approve,
            'appearance_status'=>$appearance_status,
            
        ]);

        if ($type == "lost") {
            $post->fill([
                'status' => self::TYPES[$type],
                'owner_id' => auth('api')->user()->id,
                'losted_at' => Carbon::now()->toDateTimeString(),
                'owner_releated_to_system'=>1
            ]);
            $post->save();
        }

        if ($type == "found") {
            $post->fill([
                'status' => self::TYPES[$type],
                'founder_id' => auth('api')->user()->id,
                'founded_at' => Carbon::now()->toDateTimeString(),
                'founder_releated_to_system'=>1
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
                $image_name = \Str::random(15) . '.' . 'png';
                $path = public_path('/images/posts/' . $image_name);
                Image::make(file_get_contents($image))->save($path);
                $post->images()->create([
                    'image' =>   'images/posts/' . $image_name
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
     * @bodyParam token Barier-token required
     *
     * @response
     *{
     *  "success": true,
     *  "message": "Post reported successfully.",
     *  "status_code": 200
     *}
     */
    public function report(Request $request, Post $post)
    {
        $validate_request = Validator::make(request()->all(), [
            'details' => ['nullable', 'string', 'max:1000'],
            'image' => ['sometimes', 'base64dimensions:min_width=100,min_height=200'],
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
            $image_name = \Str::random(15) . '.' . 'png';
            $path = public_path('/images/postreports/' . $image_name);
            Image::make(file_get_contents($request->image))->save($path);

            $postReport->fill([
                'image' =>   'images/postreports/' . $image_name
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
     * @bodyParam token Barier-token required
     * @response
     *  {
     * "data":  
     *  {
     *   "id": 3,
     *  "title": "Quibusdam aliquid omnis quia quibusdam molestiae placeat voluptatum consequatur.",
     * "approval_status": 1,
     *"reward": 0,
     *"description": "Repudiandae sequi enim aut et praesentium adipisci. Expedita deleniti explicabo aspernatur labore occaecati quidem unde sequi. Non omnis veritatis blanditiis harum perspiciatis cum sint. Et dignissimos temporibus ut excepturi. Molestiae eos qui occaecati iste. Accusantium enim quo rerum. Dignissimos omnis rerum voluptatem fugiat id. Ad optio blanditiis quis placeat. Officiis illum id sint omnis. Quisquam tempore beatae nesciunt. Reprehenderit sed quo est nobis excepturi nisi. Non nihil dignissimos alias totam. Adipisci occaecati accusantium illum itaque velit unde. Autem voluptas voluptatem qui commodi inventore ullam quia.",
     *"status": "found",
     *"attached_to_item": true,
     *"item": {
     * "id": 1,
     *"title": "poj",
     *"details": "pokpo",
     *"status": "found",
     *"owner": {
     * "id": 2,
     * "name": "User",
     *"email": "user@nova.com",
     *"status": 1,
     *"mobile_number": "01142416124",
     *"receive_emails": false,
     *"receive_push_notifications": false,
     *"is_email_verified": false,
     *"is_mobile_number_verified": false,
     *"default_distance_unit": "kilo"
     *},
     *"model": {
     *  "id": 3,
     *  "name": "Explicabo rerum ut et dolores officiis et.",
     *  "description": "Laudantium fugit ut harum magnam magnam deserunt.",
     *  "image": "http:\/\/wajad.test\/default-icon.png"
     *},
     * "color": {
     *   "id": 1,
     *   "name": "Red",
     *  "icon": "images\/colors\/red.png"
     *},
     * "brand": {
     *  "id": 2,
     * "name": "Et dicta similique adipisci ut autem deleniti qui.",
     * "description": "Facilis incidunt dolores consequatur quis aliquam quia voluptatem.",
     * "image": "http:\/\/wajad.test\/\/tmp\/4886df1c2c60650759bf348635be787a.jpg"
     *},
     *"date": "2019-12-13 00:00:00",
     *"images": []
     *},
     *"sub_category": {
     *  "id": 5,
     * "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
     * "description": "Quia impedit hic nesciunt quis eum.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     *},
     *"model": {
     *  "id": 3,
     *  "name": "Explicabo rerum ut et dolores officiis et.",
     *  "description": "Laudantium fugit ut harum magnam magnam deserunt.",
     * "image": "http:\/\/wajad.test\/default-icon.png"
     * },
     *   "color": {
     *    "id": 1,
     *   "name": "Red",
     *  "icon": "images\/colors\/red.png"
     *},
     * "date": "2019-12-08 15:40:37",
     * "images": [
     * {
     * "id": 1,
     * "image": "http:\/\/wajad.test\/default-icon.png"
     * }
     * ],
     * "post_requests": [
     *   {
     *     "id": 3,
     *    "is_request_valid": 0,
     *   "cliamers": {
     *    "questions": [
     *     {
     *      "id": 1,
     *     "question": "kp'[k'[p\r\n",
     *    "answers": [
     *     {
     *      "id": 1,
     *     "answer": ";lokpok",
     *    "date": "2019-12-10 00:00:00"
     *  }
     *]
     *}
     *],
     *"id": 1,
     *"name": "Admin",
     *"email": "admin@nova.com",
     *"status": 1,
     *"mobile_number": "01111086890",
     *"receive_emails": false,
     *"receive_push_notifications": false,
     *"is_email_verified": false,
     *"is_mobile_number_verified": false,
     *"default_distance_unit": "kilo"
     *},
     *"date": "2019-12-10 00:00:00"
     *}
     *],
     *"city": {
     * "id": 1,
     * "name": "Al Riyadh"
     *}
     *}
     *}
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
     * @bodyParam reward  string
     * @bodyParam longitude regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ required
     * @bodyParam latitude regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ required
     * @bodyParam sub_category_id int required exists:sub_categories,id
     * @bodyParam brand_id int required exists:brands,id
     * @bodyParam model_id int required exists:models,id
     * @bodyParam color_id int required exists:colors,id
     * @bodyParam item_id int nullable exists:items,id
     * @bodyParam city string required
     * @bodyParam images array sometimes between:1,5
     * @bodyParam images.* image sometimes mimes:jpeg,jpg,png,gif max:5012
     * @bodyParam questions array sometimes size:3
     * @bodyParam questions.* required min:9 max:500
     * @bodyParam token Barier-token required
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
                'reward' => ['string'],
                'longitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                'sub_category_id' => ['required', 'exists:sub_categories,id'],
                'brand_id' => ['required', 'exists:brands,id'],
                'model_id' => ['required', 'exists:models,id'],
                'color_id' => ['required', 'exists:colors,id'],
                'item_id' => ['nullable', 'exists:items,id'],
                'city' => ['required', 'string'],
                'images' => ['sometimes', 'array', 'between:1,5'],
                'image.*' => ['sometimes', 'base64dimensions:min_width=100,min_height=200'],
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
                $post->images()->delete();
                array_map(function ($image) use ($post, $request) {
                    $image_name = \Str::random(15) . '.' . 'png';
                    $path = public_path('/images/posts/' . $image_name);
                    Image::make(file_get_contents($image))->save($path);

                    $post->images()->create([
                        'image' =>   'images/posts/' . $image_name
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
     * @bodyParam token Barier-token required
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
